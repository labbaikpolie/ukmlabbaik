<?php

namespace App\Support;

use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RuntimeException;

class PhotoUploader
{
    public static function store(UploadedFile $file, string $folder, int $maxSide = 1200): string
    {
        // Validasi MIME type secara ketat — hanya izinkan gambar yang benar-benar aman
        $allowedMimes = ['image/jpeg', 'image/png', 'image/webp'];
        if (!in_array($file->getMimeType(), $allowedMimes, true)) {
            throw new RuntimeException('Tipe file tidak diizinkan. Hanya JPG, JPEG, PNG, dan WEBP.');
        }

        $img = self::load($file->getRealPath(), $file->getMimeType());

        if (!$img) {
            return $file->store($folder, 'public');
        }

        $target = trim($folder, '/') . '/' . Str::random(40) . '.jpg';
        if (!Storage::disk('public')->put($target, self::encode($img, $maxSide))) {
            imagedestroy($img);
            throw new RuntimeException('Gagal menyimpan foto yang telah diproses.');
        }

        imagedestroy($img);

        return $target;
    }

    public static function delete(?string $path): void
    {
        if (!empty($path) && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }

    public static function reorientExisting(string $relativePath, bool $dryRun = false, int $maxSide = 1600): string
    {
        /** @var FilesystemAdapter $disk */
        $disk = Storage::disk('public');

        if (!$disk->exists($relativePath)) {
            return 'missing';
        }

        $full = $disk->path($relativePath);
        $mime = @mime_content_type($full);

        if ($mime !== 'image/jpeg' || !function_exists('exif_read_data') || !extension_loaded('gd')) {
            return 'skipped';
        }

        $exif = @exif_read_data($full);
        $orientation = (int) ($exif['Orientation'] ?? 1);

        if ($orientation <= 1) {
            return 'ok';
        }

        if ($dryRun) {
            return 'fixed';
        }

        $img = self::load($full, $mime);
        if (!$img) {
            return 'skipped';
        }

        $encoded = self::encode($img, $maxSide);
        imagedestroy($img);

        if (!$disk->put($relativePath, $encoded)) {
            throw new RuntimeException("Gagal memperbarui orientasi foto: {$relativePath}");
        }

        return 'fixed';
    }

    private static function load(string $path, ?string $mime)
    {
        if (!extension_loaded('gd')) {
            return null;
        }

        $img = match ($mime) {
            'image/jpeg' => function_exists('imagecreatefromjpeg') ? @imagecreatefromjpeg($path) : false,
            'image/png' => function_exists('imagecreatefrompng') ? @imagecreatefrompng($path) : false,
            'image/webp' => function_exists('imagecreatefromwebp') ? @imagecreatefromwebp($path) : false,
            default => false,
        };

        if (!$img) {
            return null;
        }

        if ($mime === 'image/jpeg' && function_exists('exif_read_data')) {
            $exif = @exif_read_data($path);
            $orientation = (int) ($exif['Orientation'] ?? 1);

            switch ($orientation) {
                case 2:
                    self::flip($img, IMG_FLIP_HORIZONTAL);
                    break;
                case 3:
                    $img = self::rotate($img, 180);
                    break;
                case 4:
                    self::flip($img, IMG_FLIP_VERTICAL);
                    break;
                case 5:
                    $img = self::rotate($img, -90);
                    self::flip($img, IMG_FLIP_HORIZONTAL);
                    break;
                case 6:
                    $img = self::rotate($img, -90);
                    break;
                case 7:
                    $img = self::rotate($img, 90);
                    self::flip($img, IMG_FLIP_HORIZONTAL);
                    break;
                case 8:
                    $img = self::rotate($img, 90);
                    break;
            }
        }

        return $img;
    }

    /**
     * @param \GdImage $img
     */
    private static function encode(\GdImage $img, int $maxSide): string
    {
        $width = imagesx($img);
        $height = imagesy($img);
        $scale = min(1, $maxSide / max($width, $height));
        $newWidth = (int) round($width * $scale);
        $newHeight = (int) round($height * $scale);

        $canvas = imagecreatetruecolor($newWidth, $newHeight);
        imagefill($canvas, 0, 0, imagecolorallocate($canvas, 255, 255, 255));
        imagecopyresampled($canvas, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

        ob_start();
        $encoded = imagejpeg($canvas, null, 85);
        $contents = ob_get_clean();
        imagedestroy($canvas);

        if (!$encoded || $contents === false) {
            throw new RuntimeException('Gagal mengenkode foto menjadi JPEG.');
        }

        return $contents;
    }

    /**
     * @param \GdImage $img
     */
    private static function rotate(\GdImage $img, int $degrees)
    {
        $rotated = imagerotate($img, $degrees, 0);

        if ($rotated === false) {
            return $img;
        }

        imagedestroy($img);

        return $rotated;
    }

    /**
     * @param \GdImage $img
     */
    private static function flip(\GdImage $img, int $mode): void
    {
        imageflip($img, $mode);
    }
}

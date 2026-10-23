<?php

namespace Tests\Feature;

use App\Support\PhotoUploader;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PhotoOrientationTest extends TestCase
{
    public function test_new_jpeg_upload_is_reoriented_and_saved_without_exif(): void
    {
        Storage::fake('public');
        $disk = Storage::disk('public');
        $disk->put('source.jpg', $this->jpegWithOrientation(6));

        $file = new UploadedFile(
            $disk->path('source.jpg'),
            'source.jpg',
            'image/jpeg',
            UPLOAD_ERR_OK,
            true
        );
        $path = PhotoUploader::store($file, 'uploads');

        $this->assertStringEndsWith('.jpg', $path);
        $this->assertSame([20, 40], array_slice(getimagesize($disk->path($path)), 0, 2));
        $this->assertSame(1, (int) ((@exif_read_data($disk->path($path))['Orientation'] ?? 1)));
    }

    public function test_existing_jpeg_is_reoriented_at_the_same_path(): void
    {
        Storage::fake('public');
        $disk = Storage::disk('public');
        $path = 'photos/existing.jpg';
        $disk->put($path, $this->jpegWithOrientation(6));

        $this->assertSame('fixed', PhotoUploader::reorientExisting($path, true));
        $this->assertSame('fixed', PhotoUploader::reorientExisting($path));
        $this->assertSame([20, 40], array_slice(getimagesize($disk->path($path)), 0, 2));
        $this->assertSame(1, (int) ((@exif_read_data($disk->path($path))['Orientation'] ?? 1)));
    }

    private function jpegWithOrientation(int $orientation): string
    {
        $image = imagecreatetruecolor(40, 20);
        ob_start();
        imagejpeg($image);
        $jpeg = ob_get_clean();
        imagedestroy($image);

        $exif = 'Exif' . "\0\0" . 'II' . pack('v', 42) . pack('V', 8)
            . pack('v', 1) . pack('v', 0x0112) . pack('v', 3)
            . pack('V', 1) . pack('v', $orientation) . pack('v', 0) . pack('V', 0);

        return substr($jpeg, 0, 2)
            . "\xFF\xE1"
            . pack('n', strlen($exif) + 2)
            . $exif
            . substr($jpeg, 2);
    }
}

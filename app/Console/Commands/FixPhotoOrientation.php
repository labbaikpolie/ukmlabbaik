<?php

namespace App\Console\Commands;

use App\Models\Bph;
use App\Models\Blog;
use App\Models\Kemuslimahan;
use App\Models\Kominfo;
use App\Models\kwu;
use App\Models\MinatBakat;
use App\Models\psdm;
use App\Models\Syiar;
use App\Support\PhotoUploader;
use Illuminate\Console\Command;

class FixPhotoOrientation extends Command
{
    protected $signature = 'photos:fix-orientation {--dry-run : Hanya laporan, tidak mengubah file}';

    protected $description = 'Memperbaiki orientasi EXIF foto yang telah tersimpan.';

    public function handle(): int
    {
        $models = [
            Bph::class,
            Kominfo::class,
            Syiar::class,
            Kemuslimahan::class,
            psdm::class,
            kwu::class,
            MinatBakat::class,
            Blog::class,
        ];
        $records = collect();

        foreach ($models as $model) {
            $records = $records->concat(
                $model::withTrashed()
                    ->whereNotNull('foto')
                    ->where('foto', '!=', '')
                    ->get(['foto'])
            );
        }

        $counts = ['fixed' => 0, 'ok' => 0, 'skipped' => 0, 'missing' => 0];
        $missingPaths = [];
        $progress = $this->output->createProgressBar($records->count());
        $progress->start();

        foreach ($records as $record) {
            $status = PhotoUploader::reorientExisting($record->foto, (bool) $this->option('dry-run'));
            $counts[$status]++;

            if ($status === 'missing') {
                $missingPaths[] = $record->foto;
            }

            $progress->advance();
        }

        $progress->finish();
        $this->newLine(2);
        $this->table(['Status', 'Jumlah'], collect($counts)->map(
            fn (int $count, string $status): array => [$status, $count]
        )->values()->all());

        if ($missingPaths !== []) {
            $this->warn('Path foto yang hilang tetapi masih tercatat di database:');
            foreach ($missingPaths as $path) {
                $this->line($path);
            }
        }

        if ($this->option('dry-run')) {
            $this->comment('Mode dry-run: tidak ada file yang diubah.');
        }

        return self::SUCCESS;
    }
}

<?php

namespace App\View\Composers;

use Illuminate\Support\Collection;
use Illuminate\View\View;

class AdminLayoutComposer
{
    public function compose(View $view): void
    {
        $viewData = $view->getData();
        $segment = request()->segment(2);
        $articles = $viewData['data'] ?? collect();
        $memberCollection = match ($segment) {
            'bph' => $viewData['bph'] ?? collect(),
            'kominfo' => $viewData['kominfo'] ?? collect(),
            'syiar' => $viewData['syiar'] ?? collect(),
            'kemuslimahan' => $viewData['kemu'] ?? collect(),
            'psdm' => $viewData['psdm'] ?? collect(),
            'kwu' => $viewData['kwu'] ?? collect(),
            'minatbakat' => $viewData['minatbakat'] ?? collect(),
            default => collect(),
        };

        if ($segment === null) {
            $adminStatCount = $articles->count();
            $latestArticleDate = $articles->max('tanggal_post');
            $latestArticle = filled($latestArticleDate)
                ? \Illuminate\Support\Carbon::parse($latestArticleDate)->format('d/m')
                : '-';
            $adminStatCards = [
                [
                    'label' => 'Total Artikel',
                    'value' => $adminStatCount,
                    'icon' => 'mdi-file-document-outline',
                    'tone' => 'yellow',
                ],
                [
                    'label' => 'Artikel Terbaru',
                    'value' => $latestArticle,
                    'icon' => 'mdi-calendar-clock',
                    'tone' => 'blue',
                ],
            ];
        } elseif (
            in_array($segment, ['bph', 'kominfo', 'syiar', 'kemuslimahan', 'psdm', 'kwu', 'minatbakat'], true)
            && $memberCollection instanceof Collection
        ) {
            $adminStatCount = $memberCollection->count();
            $adminStatCards = [
                [
                    'label' => 'Total Anggota',
                    'value' => $adminStatCount,
                    'icon' => 'mdi-account-group-outline',
                    'tone' => 'yellow',
                ],
                [
                    'label' => 'Jumlah Prodi',
                    'value' => $memberCollection->pluck('prodi')->filter()->unique()->count(),
                    'icon' => 'mdi-school',
                    'tone' => 'blue',
                ],
                [
                    'label' => 'Jumlah Angkatan',
                    'value' => $memberCollection->pluck('angkatan')->filter()->unique()->count(),
                    'icon' => 'mdi-account-multiple-outline',
                    'tone' => 'green',
                ],
            ];
        } else {
            $adminStatCount = null;
            $adminStatCards = [];
        }

        $view->with(compact('adminStatCount', 'adminStatCards'));
    }
}

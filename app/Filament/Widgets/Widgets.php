<?php

namespace App\Filament\Widgets;

use App\Models\Barang;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

// WIDGET !!!
class Widgets extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Barang', Barang::query()->count())
                ->descriptionIcon('heroicon-clipboard-document-list')
                ->color('success'),

            Stat::make('', 'Website')
                ->descriptionIcon('heroicon-clipboard-document-list')
                ->color('success')
                ->extraAttributes([
                    'class' => 'curson-pointer'
                ])
                ->description('Aktif')
                ->descriptionIcon('heroicon-m-home')
                ->url(route('website.frontend'))
                ->openUrlInNewTab(),
        ];
    }
}

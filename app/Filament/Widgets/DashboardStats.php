<?php

namespace App\Filament\Widgets;

use Faker\Provider\zh_CN\Color;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Skema', \App\Models\Skema::count())
                ->description('Jumlah skema yang tersedia')
                ->descriptionIcon('heroicon-o-rectangle-stack')
                ->color('success'),

            Stat::make('Total Peserta', \App\Models\Peserta::count())
                ->description('Jumlah peserta yang terdaftar')
                ->descriptionIcon('heroicon-o-users')
                ->color('primary'),

            Stat::make('Skema Terbaru', \App\Models\Skema::latest()->first()?->nama_skema ?? 'N/A')
                ->description('Skema yang baru saja ditambahkan')
                ->color('warning'),

        ];
    }
}

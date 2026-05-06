<?php

namespace App\Filament\Widgets;

use App\Models\Project;
use App\Models\Task;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TaskStats extends BaseWidget
{

    protected function getStats(): array
    {
        return [

        Stat::make('Total Project', (string) Project::count()) 
            ->description('Semua projek yang terdaftar')
            ->descriptionIcon('heroicon-m-briefcase')
            ->color('primary'),

        Stat::make('Total Task', (string) Task::count())
            ->description('Total tugas di semua projek'),

        Stat::make('Task Todo', (string) Task::where('status', 'todo')->count())
            ->color('gray'),

        Stat::make('Task In Proges', (string) Task::where('status', 'in proges')->count())
            ->color('gray'),

        Stat::make('Task Done', (string) Task::where('status', 'done')->count())
            ->color('gray'),

        ];
        
    }
}

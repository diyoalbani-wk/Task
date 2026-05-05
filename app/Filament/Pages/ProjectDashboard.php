<?php

namespace App\Filament\Pages;

use App\Models\Project;
use Filament\Pages\Page;
use Filament\Tables\Table;
use UnitEnum;
use BackedEnum;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Concerns\InteractsWithTable;

class ProjectDashboard extends Page implements HasTable
{
    use InteractsWithTable;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-presentation-chart-bar';
    
    protected static string|UnitEnum|null $navigationGroup = 'Dashboard'; 
    protected static ?string $title = 'Project Dashboard';

    public function getView(): string
    {
        return 'filament.pages.project-dashboard';
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(Project::query())
            ->columns([
                TextColumn::make('name')
                    ->label('Nama Projek')
                    ->searchable(),

                TextColumn::make('tasks_count')
                    ->counts('tasks')
                    ->label('Total Task')
                    ->badge(),

                TextColumn::make('pending_tasks')
                    ->label('Pending')
                    ->getStateUsing(fn ($record) => $record->tasks()->where('status', 'todo')->count())
                    ->color('gray'),

                TextColumn::make('in_progress_tasks')
                    ->label('In Progress')
                    ->getStateUsing(fn ($record) => $record->tasks()->where('status', 'in_progress')->count())
                    ->color('warning'),

                TextColumn::make('finished_tasks')
                    ->label('Finished')
                    ->getStateUsing(fn ($record) => $record->tasks()->where('status', 'done')->count())
                    ->color('success'),
            ]);
    }
}
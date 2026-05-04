<?php

namespace App\Filament\Resources\Tasks\Schemas;

use App\Models\Project;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput; 
use Filament\Forms\Components\Textarea; 
use Filament\Schemas\Schema;
use Closure;

class TasksForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('project_id')
                    ->relationship('project', 'name')
                    ->required()
                    ->live()
                    ->rules([
                        fn ($get): Closure => function (string $attribute, $value, Closure $fail) {
                            $project = Project::find($value);
                            if ($project && $project->end_date < now()->startOfDay()) {
                                $fail("Project ini sudah berakhir pada {$project->end_date->format('d/m/Y')}. Tidak bisa menambah task baru.");
                            }
                        },
                    ]),

                TextInput::make('title')
                    ->required()
                    ->maxLength(255),

                Textarea::make('description')
                    ->maxLength(65535)
                    ->columnSpanFull(),

                Select::make('status')
                    ->options([
                        'todo' => 'To Do',
                        'in_progress' => 'In Progress',
                        'done' => 'Done',
                    ])
                    ->required()
                    ->default('todo'),

                Select::make('tags')
                    ->relationship('tags', 'name')
                    ->multiple()
                    ->preload()
                    ->searchable(),
            ]);
    }
}
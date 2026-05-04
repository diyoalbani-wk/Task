<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Schema;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(150),

                Textarea::make('description')
                    ->maxLength(255),

                DatePicker::make('start_date')
                    ->required()
                    ->native(false) 
                    ->displayFormat('d/m/Y'),

                DatePicker::make('end_date')
                    ->required()
                    ->native(false)
                    ->displayFormat('d/m/Y')
                    ->after('start_date'),
            ]);
    }
}

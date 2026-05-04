<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->length(150),
                TextInput::make('description')
                    ->length(255),
                TextInput::make('start_date')
                    
            ]);
    }
}

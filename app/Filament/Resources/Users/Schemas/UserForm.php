<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section; 
use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select; 

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),

                TextInput::make('password')
                    ->password()
                    ->dehydrated(fn ($state) => filled($state))
                    ->required(fn (string $context): bool => $context === 'create'),

                TextInput::make('phone'),

                Textarea::make('address')
                    ->maxLength(250),
                
                Select::make('roles')
                    ->relationship('roles', 'name') 
                    ->preload() 
                    ->searchable(),

                Section::make('Profile')
                    ->relationship('profile') 
                    ->schema([
                        FileUpload::make('avatar')
                            ->image()
                            ->disk('public') 
                            ->directory('profiles') 
                            ->visibility('public') 
                            ->imagePreviewHeight('100'),

                        Textarea::make('bio'),
                    ]),
            ]);
    }
}
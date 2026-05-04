<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;
    
    protected function afterCreate(): void
    {
        $this->record->profile()->create(
            $this->data['profile'] ?? []
        );
    }
}

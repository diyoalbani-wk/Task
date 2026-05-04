<?php

namespace App\Filament\Resources\Tasks;

use App\Filament\Resources\Tasks\Pages\CreateTasks;
use App\Filament\Resources\Tasks\Pages\EditTasks;
use App\Filament\Resources\Tasks\Pages\ListTasks;
use App\Filament\Resources\Tasks\Pages\ViewTasks;
use App\Filament\Resources\Tasks\Schemas\TasksForm;
use App\Filament\Resources\Tasks\Schemas\TasksInfolist;
use App\Filament\Resources\Tasks\Tables\TasksTable;
use App\Models\Task;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TasksResource extends Resource
{
    protected static ?string $model = Task::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocument;

    public static function form(Schema $schema): Schema
    {
        return TasksForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return TasksInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TasksTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTasks::route('/'),
            'create' => CreateTasks::route('/create'),
            'view' => ViewTasks::route('/{record}'),
            'edit' => EditTasks::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookResource\Pages;
use App\Filament\Resources\BookResource\RelationManagers;
use App\Filament\Roles;
use Filament\Resources\Forms\Components;
use Filament\Resources\Forms\Form;
use Filament\Resources\Resource;
use Filament\Resources\Tables\Columns;
use Filament\Resources\Tables\Filter;
use Filament\Resources\Tables\Table;

class BookResource extends Resource
{
    public static $icon = 'heroicon-o-book-open';

    public static function form(Form $form)
    {
        return $form
            ->schema([
                Components\TextInput::make('title')
                ->autofocus()
                ->required()
                ->max(255),
                Components\BelongsToSelect::make('author_id')
                ->relationship('author', 'name'),
            ]);
    }

    public static function table(Table $table)
    {
        return $table
            ->columns([
                Columns\Text::make('title')->sortable()->searchable()->primary(),
                Columns\Text::make('author.name'),

            ])
            ->filters([
                //
            ]);
    }

    public static function relations()
    {
        return [
            //
        ];
    }

    public static function routes()
    {
        return [
            Pages\ListBooks::routeTo('/', 'index'),
            Pages\CreateBook::routeTo('/create', 'create'),
            Pages\EditBook::routeTo('/{record}/edit', 'edit'),
        ];
    }
}

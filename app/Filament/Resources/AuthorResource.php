<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AuthorResource\Pages;
use App\Filament\Resources\AuthorResource\RelationManagers;
use App\Filament\Roles;
use Filament\Resources\Forms\Components;
use Filament\Resources\Forms\Form;
use Filament\Resources\Resource;
use Filament\Resources\Tables\Columns;
use Filament\Resources\Tables\Filter;
use Filament\Resources\Tables\Table;

class AuthorResource extends Resource
{
    public static $icon = 'heroicon-o-user';

    public static function form(Form $form)
    {
        return $form
            ->schema([
                Components\TextInput::make('name')
                ->autofocus()
                ->required()
                ->max(255)
                ->unique('authors', 'name', true),
                Components\DatePicker::make('birth')->displayFormat('d/m/Y')->required(),
            ]);
    }

    public static function table(Table $table)
    {
        return $table
            ->columns([
                Columns\Text::make('name')->sortable()->searchable()->primary(),
                Columns\Text::make('birth')->date('d/m/Y')->sortable(),
                Columns\Text::make('Books')->getValueUsing(
                    function ($author) {
                        return (string)$author->books()->count();
                    }
                ),
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
            Pages\ListAuthors::routeTo('/', 'index'),
            Pages\CreateAuthor::routeTo('/create', 'create'),
            Pages\EditAuthor::routeTo('/{record}/edit', 'edit'),
        ];
    }
}

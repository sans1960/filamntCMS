<?php

namespace App\Filament\Resources\BookResource\Pages;

use App\Filament\Resources\BookResource;
use Filament\Resources\Pages\ListRecords;

class ListBooks extends ListRecords
{
    public static $resource = BookResource::class;
}

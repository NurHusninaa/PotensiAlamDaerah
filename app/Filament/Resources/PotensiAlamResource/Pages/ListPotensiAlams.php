<?php

namespace App\Filament\Resources\PotensiAlamResource\Pages;

use App\Filament\Resources\PotensiAlamResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPotensiAlams extends ListRecords
{
    protected static string $resource = PotensiAlamResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

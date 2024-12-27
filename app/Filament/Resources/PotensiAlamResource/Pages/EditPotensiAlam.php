<?php

namespace App\Filament\Resources\PotensiAlamResource\Pages;

use App\Filament\Resources\PotensiAlamResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPotensiAlam extends EditRecord
{
    protected static string $resource = PotensiAlamResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

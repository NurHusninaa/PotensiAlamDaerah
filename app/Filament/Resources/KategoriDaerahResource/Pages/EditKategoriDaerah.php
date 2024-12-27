<?php

namespace App\Filament\Resources\KategoriDaerahResource\Pages;

use App\Filament\Resources\KategoriDaerahResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKategoriDaerah extends EditRecord
{
    protected static string $resource = KategoriDaerahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

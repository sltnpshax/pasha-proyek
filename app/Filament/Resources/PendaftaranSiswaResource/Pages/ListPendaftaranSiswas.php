<?php

namespace App\Filament\Resources\PendaftaranSiswaResource\Pages;

use App\Filament\Resources\PendaftaranSiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPendaftaranSiswas extends ListRecords
{
    protected static string $resource = PendaftaranSiswaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\PendaftaranSiswaResource\Pages;

use App\Filament\Resources\PendaftaranSiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPendaftaranSiswa extends EditRecord
{
    protected static string $resource = PendaftaranSiswaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

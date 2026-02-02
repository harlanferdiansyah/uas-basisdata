<?php

namespace App\Filament\Admin\Resources\DcmResource\Pages;

use App\Filament\Admin\Resources\DcmResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDcm extends EditRecord
{
    protected static string $resource = DcmResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

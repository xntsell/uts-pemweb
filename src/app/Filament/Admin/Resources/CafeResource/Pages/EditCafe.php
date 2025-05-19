<?php

namespace App\Filament\Admin\Resources\CafeResource\Pages;

use App\Filament\Admin\Resources\CafeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCafe extends EditRecord
{
    protected static string $resource = CafeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

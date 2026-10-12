<?php

namespace App\Filament\Resources\SkemaResource\Pages;

use App\Filament\Resources\SkemaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSkema extends EditRecord
{
    protected static string $resource = SkemaResource::class;

       public function getTitle(): string
    {
        return "Edit {$this->record->nama_skema}"; 
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

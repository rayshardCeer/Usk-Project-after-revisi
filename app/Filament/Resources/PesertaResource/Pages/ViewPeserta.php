<?php

namespace App\Filament\Resources\PesertaResource\Pages;

use App\Filament\Resources\PesertaResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPeserta extends ViewRecord
{
    protected static string $resource = PesertaResource::class;
     public function getTitle(): string
    {
        return "View {$this->record->nama}"; 
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}

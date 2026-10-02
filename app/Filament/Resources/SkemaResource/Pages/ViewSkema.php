<?php

namespace App\Filament\Resources\SkemaResource\Pages;

use App\Filament\Resources\SkemaResource;
use Filament\Resources\Pages\ViewRecord;

class ViewSkema extends ViewRecord
{
    protected static string $resource = SkemaResource::class;
      public function getTitle(): string
    {
        return "View {$this->record->nama_skema}"; 
    }
}
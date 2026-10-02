<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SkemaResource\Pages;
use App\Filament\Resources\SkemaResource\RelationManagers;
use App\Models\Skema;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use function Laravel\Prompts\table;

class SkemaResource extends Resource
{
    protected static ?string $model = Skema::class;

    protected static ?string $navigationIcon = 'heroicon-o-swatch';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_skema')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('deskripsi_skema')
                    ->required()
                    ->maxLength(1000),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kode_skema')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nama_skema')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('deskripsi_skema')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\ViewAction::make(),
                ])
                ->label('Actions')
                ->button()
             
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSkemas::route('/'),
            'create' => Pages\CreateSkema::route('/create'),
            'view' => Pages\ViewSkema::route('/{record}'),
            'edit' => Pages\EditSkema::route('/{record}/edit'),
        ];
    }
}

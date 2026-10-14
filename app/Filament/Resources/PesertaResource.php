<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PesertaResource\Pages;
use App\Models\Peserta;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Override;

class PesertaResource extends Resource
{
    protected static ?string $model = Peserta::class;
    protected static ?string $pluralLabel = 'Daftar Peserta Ujian';
    protected static ?string $navigationIcon = 'heroicon-o-users';


    public static function form(Form $form): Form
    {
        return $form
                ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(30),
                Forms\Components\Select::make('skema_id')
                ->relationship('skema', 'nama_skema')
                ->required()
                ->searchable()
                ->preload()
                ->label('Skema Sertifikasi'),
                Forms\Components\TextInput::make('instansi')
                    ->required()
                    ->maxLength(30),
                Forms\Components\TextInput::make('nik')
                    ->label("NIK")
                    ->required()
                    ->maxLength(16),
                Forms\Components\Select::make('status')
                    ->required()
                    ->label('Status')
                    ->options([
                        'worker' => 'Pekerja',
                        'student' => 'Siswa',
                    ]),
                Forms\Components\Textarea::make('alamat')
                    ->required()
                    ->maxLength(100),
            ]);
    }

    #[Override]
    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        if(!auth()->user()->hasRole('super_admin')){
          $query->where('user_id', auth()->id());
        }
            return $query;
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('skema.nama_skema')
                    ->label('Skema Sertifikasi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('instansi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kelas')
                    ->label('Kelas')
                    ->sortable()
                    ->formatStateUsing(fn($state)=> match($state){
                        '10' => 'Grade X',
                        '11' => 'Grade XI',
                        '12' => 'Grade XII',
                    }),
                Tables\Columns\TextColumn::make('alamat')
                    ->searchable(),
            ])
            ->filters([
                
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
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
            'index' => Pages\ListPesertas::route('/'),
            'create' => Pages\CreatePeserta::route('/create'),
            'view' => Pages\ViewPeserta::route('/{record}'),
            'edit' => Pages\EditPeserta::route('/{record}/edit'),
        ];
    }
}
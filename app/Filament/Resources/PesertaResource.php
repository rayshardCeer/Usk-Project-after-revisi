<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PesertaResource\Pages;
use App\Models\Peserta;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\RawJs;
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
                    ->regex('/^[a-zA-Z\s]+$/')
                    ->validationMessages([
                        'regex' => 'Nama hanya boleh mengandung huruf dan spasi.',
                    ])
                    ->maxLength(30),
                Forms\Components\TextInput::make('nik')
                    ->required()
                    ->mask(RawJs::make('return {mask: "0000000000000000"}'))
                    ->extrainputAttributes(['onkeypress' => 'return event.charCode >= 48 && event.charCode <= 57'])
                    ->minLength(16)
                    ->maxLength(16)
                    ->validationMessages([
                        'min' => 'NIK harus terdiri dari 16 digit.',
                        'max' => 'NIK harus terdiri dari 16 digit.',
                    ]),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(30),
                    Forms\Components\TextInput::make('no_hp')
                        ->label('Nomor Handphone')
                        ->hint('contoh: 081234567890')
                        ->required()
                        ->validationMessages([
                            'regex' => 'Nomor handphone harus valid dan harus minimal 11 angka.',
                        ])
                        ->mask(RawJs::make('return {mask: "0"}'))
                        ->extrainputAttributes(['onkeypress' => 'return event.charCode >= 48 && event.charCode <= 57'])
                        ->minLength(11)
                        ->maxLength(13),
                Forms\Components\Select::make('skema_id')
                ->relationship('skema', 'nama_skema')
                ->required()
                ->searchable()
                ->preload()
                ->label('Skema Sertifikasi'),
                Forms\Components\TextInput::make('instansi')
                    ->required()
                    ->maxLength(50),
                Forms\Components\Select::make('status')
                    ->required()
                    ->label('Status')
                    ->options([
                        'worker' => 'Worker',
                        'student' => 'Student',
                    ]),
             
                Forms\Components\Textarea::make('alamat')
                    ->required()
                    ->regex('/^[a-zA-Z0-9\s,.-]+$/')
                    ->validationMessages([
                        'regex' => 'Alamat hanya boleh mengandung huruf, angka, spasi, koma, titik, dan tanda hubung.',
                    ])
                    ->maxLength(150),
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
                Tables\Columns\TextColumn::make('nik')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('no_hp')
                    ->label('Nomor Handphone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('skema.nama_skema')
                    ->label('Skema Sertifikasi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('instansi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->sortable()
                    ->formatStateUsing(fn($state)=> match($state){
                        'worker' => 'Worker',
                        'student' => 'Student',
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
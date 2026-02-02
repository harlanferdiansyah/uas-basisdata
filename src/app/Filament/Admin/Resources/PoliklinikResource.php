<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PoliklinikResource\Pages;
use App\Models\Poliklinik;
use App\Models\RumahSakit;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PoliklinikResource extends Resource
{
    protected static ?string $model = Poliklinik::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';

    protected static ?string $navigationLabel = 'Poliklinik';

    protected static ?string $pluralLabel = 'Poliklinik';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('upload_gambar')
                    ->image()
                    ->disk('public')
                    ->directory('poliklinik')
                    ->maxSize(2048),

                Forms\Components\Select::make('rumah_sakit_id')
                    ->label('Rumah Sakit')
                    ->relationship('rumahSakit', 'nama_rs')
                    ->searchable()
                    ->required(),

                Forms\Components\TextInput::make('nama_poli')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('kode_poli')
                    ->required()
                    ->maxLength(20)
                    ->unique(ignoreRecord: true),

                Forms\Components\Textarea::make('deskripsi')
                    ->columnSpanFull(),

                Forms\Components\TextInput::make('lokasi')
                    ->maxLength(255),

                Forms\Components\TimePicker::make('jam_buka')
                    ->required(),

                Forms\Components\TimePicker::make('jam_tutup')
                    ->required(),

                Forms\Components\Select::make('status')
                    ->options([
                        'aktif' => 'Aktif',
                        'nonaktif' => 'Non Aktif',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('upload_gambar'),

                Tables\Columns\TextColumn::make('rumahSakit.nama_rs')
                    ->label('Rumah Sakit')
                    ->searchable(),

                Tables\Columns\TextColumn::make('nama_poli')
                    ->searchable(),

                Tables\Columns\TextColumn::make('kode_poli')
                    ->searchable(),

                Tables\Columns\TextColumn::make('jam_buka'),

                Tables\Columns\TextColumn::make('jam_tutup'),

                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'success' => 'aktif',
                        'danger' => 'nonaktif',
                    ]),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPolikliniks::route('/'),
            'create' => Pages\CreatePoliklinik::route('/create'),
            'edit' => Pages\EditPoliklinik::route('/{record}/edit'),
        ];
    }
}

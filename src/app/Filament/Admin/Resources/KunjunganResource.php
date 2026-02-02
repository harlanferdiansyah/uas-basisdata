<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\KunjunganResource\Pages;
use App\Models\Kunjungan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class KunjunganResource extends Resource
{
    protected static ?string $model = Kunjungan::class;
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Kunjungan')
                    ->schema([
                        Forms\Components\Select::make('pasien_id')
                            ->relationship('pasien', 'nama_pasien')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Forms\Components\Select::make('jadwal_praktek_id')
                            ->relationship('jadwalPraktek', 'id') // Sesuaikan kolom labelnya
                            ->required(),
                        Forms\Components\DatePicker::make('tanggal_kunjungan')
                            ->default(now())
                            ->required(),
                        Forms\Components\TextInput::make('nomor_antrian')
                            ->numeric(),
                        Forms\Components\Select::make('status_kunjungan')
                            ->options([
                                'menunggu' => 'Menunggu',
                                'diperiksa' => 'Diperiksa',
                                'selesai' => 'Selesai',
                                'dibatalkan' => 'Dibatalkan',
                            ])->default('menunggu')->required(),
                    ])->columns(2),

                Forms\Components\Section::make('Detail Medis')
                    ->schema([
                        Forms\Components\Textarea::make('keluhan')->rows(3),
                        Forms\Components\Textarea::make('diagnosa')->rows(3),
                        Forms\Components\TimePicker::make('jam_datang'),
                        Forms\Components\TimePicker::make('jam_selesai'),
                        Forms\Components\Textarea::make('catatan_tambahan')->columnSpanFull(),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nomor_antrian')->sortable(),
                Tables\Columns\TextColumn::make('pasien.nama_pasien')->searchable(),
                Tables\Columns\TextColumn::make('tanggal_kunjungan')->date()->sortable(),
                Tables\Columns\BadgeColumn::make('status_kunjungan')
                    ->colors([
                        'warning' => 'menunggu',
                        'primary' => 'diperiksa',
                        'success' => 'selesai',
                        'danger' => 'dibatalkan',
                    ]),
                Tables\Columns\TextColumn::make('jam_datang')->time(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status_kunjungan')
                    ->options([
                        'menunggu' => 'Menunggu',
                        'selesai' => 'Selesai',
                    ]),
            ])
            ->actions([Tables\Actions\EditAction::make()])
            ->bulkActions([Tables\Actions\DeleteBulkAction::make()]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKunjungans::route('/'),
            'create' => Pages\CreateKunjungan::route('/create'),
            'edit' => Pages\EditKunjungan::route('/{record}/edit'),
        ];
    }
}

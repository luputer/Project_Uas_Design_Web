<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CalegResource\Pages;
use App\Filament\Resources\CalegResource\RelationManagers;
use App\Models\Caleg;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CalegResource extends Resource
{
    protected static ?string $model = Caleg::class;

    protected static ?string $navigationLabel = 'Caleg';

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nik')
                    ->required()
                    ->maxLength(16),
                Forms\Components\TextInput::make('nama_lengkap')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('tanggal_lahir')
                    ->required(),
                Forms\Components\Select::make('jenis_kelamin')
                    ->options([
                        'Laki-Laki' => 'Laki-Laki',
                        'Perempuan' => 'Perempuan',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('agama')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('alamat')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('pekerjaan')
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make('pendidikan_terakhir')
                    ->required()
                    ->maxLength(100),
                Forms\Components\FileUpload::make('foto')
                    ->required()
                    ->image()
                    ->maxSize(2048),
                Forms\Components\Select::make('partai_id')
                    ->relationship('partai', 'nama_partai')
                    ->required(),
                Forms\Components\Select::make('dapil_id')
                    ->relationship('dapil', 'nama_dapil')
                    ->required(),
                Forms\Components\TextInput::make('nomor_urut')
                    ->required()
                    ->numeric(),
                Forms\Components\Select::make('status_verifikasi')
                    ->options([
                        'Belum Terverifikasi' => 'Belum Terverifikasi',
                        'Terverifikasi' => 'Terverifikasi',
                    ])
                    ->required(),
                Forms\Components\TextArea::make('catatan_verifikasi')
                    ->maxLength(500),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto')
                    ->size(50),
                Tables\Columns\TextColumn::make('nik'),
                Tables\Columns\TextColumn::make('nama_lengkap'),
                Tables\Columns\TextColumn::make('partai.nama_partai'),
                Tables\Columns\TextColumn::make('dapil.nama_dapil'),
                Tables\Columns\TextColumn::make('nomor_urut'),
                Tables\Columns\TextColumn::make('status_verifikasi'),
            ])
            ->filters([
                //  
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListCalegs::route('/'),
            'create' => Pages\CreateCaleg::route('/create'),
            'edit' => Pages\EditCaleg::route('/{record}/edit'),
        ];
    }
}

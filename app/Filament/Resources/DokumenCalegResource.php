<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\DokumenCaleg;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\DokumenCalegResource\Pages;
use App\Filament\Resources\DokumenCalegResource\RelationManagers;

class DokumenCalegResource extends Resource
{
    protected static ?string $model = DokumenCaleg::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('caleg_id')->relationship('caleg', 'nama_lengkap')
                    ->required()->label('Caleg'),
                TextInput::make('jenis_dokumen')->required()->label('Jenis Dokumen'),
                FileUpload::make('file_path')->required()->label('Path File'),
                Toggle::make('status_verifikasi')->label('Status Verifikasi'),
                Textarea::make('catatan')->label('Catatan')->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('caleg.nama_lengkap')->label('Nama Caleg'),
                TextColumn::make('jenis_dokumen')->label('Jenis Dokumen'),
                TextColumn::make('file_path')->label('Path File'),
                TextColumn::make('status_verifikasi')
                    ->label('Status Verifikasi')
                    ->getStateUsing(function ($record) {
                        return $record->status_verifikasi ? 'Terverifikasi' : 'Tidak Terverifikasi';
                    }),
                TextColumn::make('catatan')->label('Catatan'),
                TextColumn::make('created_at')->label('Dibuat Pada')->dateTime(),
                TextColumn::make('updated_at')->label('Diperbarui Pada')->dateTime(),
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
            'index' => Pages\ListDokumenCalegs::route('/'),
            'create' => Pages\CreateDokumenCaleg::route('/create'),
            'edit' => Pages\EditDokumenCaleg::route('/{record}/edit'),
        ];
    }
}

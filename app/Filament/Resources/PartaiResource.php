<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PartaiResource\Pages;
use App\Filament\Resources\PartaiResource\RelationManagers;
use App\Models\Partai;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PartaiResource extends Resource
{
    protected static ?string $model = Partai::class;

    protected static ?string $navigationLabel = 'Partai';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_partai')
                    ->label('Nama Partai')
                    ->required(),
                Forms\Components\TextInput::make('nomor_urut')
                    ->label('Nomor Urut')
                    ->numeric()
                    ->required(),
                Forms\Components\FileUpload::make('logo')
                    ->label('Logo')
                    ->image()
                    ->disk('public') // Atur disk sesuai kebutuhan
                    ->directory('logos')
                    ->required(),
                Forms\Components\TextInput::make('alamat_kantor')
                    ->label('Alamat Kantor')
                    ->required(),
                Forms\Components\TextInput::make('ketua_partai')
                    ->label('Ketua Partai')
                    ->required(),
                Forms\Components\TextInput::make('sekretaris_partai')
                    ->label('Sekretaris Partai')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_partai')->label('Nama Partai'),
                Tables\Columns\TextColumn::make('nomor_urut')->label('Nomor Urut'),
                Tables\Columns\ImageColumn::make('logo')->label('Logo'),
                Tables\Columns\TextColumn::make('alamat_kantor')->label('Alamat Kantor'),
                Tables\Columns\TextColumn::make('ketua_partai')->label('Ketua Partai'),
                Tables\Columns\TextColumn::make('sekretaris_partai')->label('Sekretaris Partai'),
                Tables\Columns\TextColumn::make('created_at')->label('Dibuat Pada')->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')->label('Diperbarui Pada')->dateTime(),
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
            'index' => Pages\ListPartais::route('/'),
            'create' => Pages\CreatePartai::route('/create'),
            'edit' => Pages\EditPartai::route('/{record}/edit'),
        ];
    }
}

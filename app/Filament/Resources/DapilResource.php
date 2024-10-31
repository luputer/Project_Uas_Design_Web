<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DapilResource\Pages;
use App\Filament\Resources\DapilResource\RelationManagers;
use App\Models\Dapil;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DapilResource extends Resource
{
    protected static ?string $model = Dapil::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Input untuk nama dapil
                Forms\Components\TextInput::make('nama_dapil')
                    ->required()
                    ->label('Nama Dapil'),

                // Input untuk wilayah cakupan
                Forms\Components\Textarea::make('wilayah_cakupan')
                    ->label('Wilayah Cakupan'),

                // Input untuk jumlah kursi
                Forms\Components\TextInput::make('jumlah_kursi')
                    ->label('Jumlah Kursi')
                    ->numeric()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
          ->columns([
                // Kolom untuk nama dapil
                Tables\Columns\TextColumn::make('nama_dapil')
                    ->label('Nama Dapil')
                    ->sortable()
                    ->searchable(),

                // Kolom untuk wilayah cakupan
                Tables\Columns\TextColumn::make('wilayah_cakupan')
                    ->label('Wilayah Cakupan')
                    ->sortable(),

                // Kolom untuk jumlah kursi
                Tables\Columns\TextColumn::make('jumlah_kursi')
                    ->label('Jumlah Kursi')
                    ->sortable(),
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
            'index' => Pages\ListDapils::route('/'),
            'create' => Pages\CreateDapil::route('/create'),
            'edit' => Pages\EditDapil::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\PersonalBrand;
use Filament\Resources\Resource;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PersonalBrandResource\Pages;
use App\Filament\Resources\PersonalBrandResource\RelationManagers;

class PersonalBrandResource extends Resource
{
    protected static ?string $model = PersonalBrand::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('nama')->required()->label('Nama'),
            TextInput::make('nim')->required()->label('NIM'),
            TextInput::make('email')->required()->email()->label('Email'),
            TextInput::make('github')->required()->label('GitHub'),
            TextInput::make('linkPortfolio')->required()->label('Link Portfolio'),
            Textarea::make('goal')->required()->label('Goal'),
            TextInput::make('phone')->required()->label('Phone'),
            FileUpload::make('image')->required()->label('Image'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('nama')->label('Nama'),
            TextColumn::make('nim')->label('NIM'),
            TextColumn::make('email')->label('Email'),
            TextColumn::make('github')->label('GitHub'),
            TextColumn::make('linkPortfolio')->label('Link Portfolio'),
            TextColumn::make('goal')->label('Goal'),
            TextColumn::make('phone')->label('Phone'),
            ImageColumn::make('image')
                ->label('Image')
                ->url(fn ($record) => asset('storage/' . $record->image)), // Generate the full URL
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
            'index' => Pages\ListPersonalBrands::route('/'),
            'create' => Pages\CreatePersonalBrand::route('/create'),
            'edit' => Pages\EditPersonalBrand::route('/{record}/edit'),
        ];
    }
}
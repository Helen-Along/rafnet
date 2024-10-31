<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SuppilerResource\Pages;
use App\Filament\Resources\SuppilerResource\RelationManagers;
use App\Models\Suppiler;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SuppilerResource extends Resource
{
    protected static ?string $model = Suppiler::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\Select::make('supplier_id')
                ->relationship('supplier', 'name')
                ->searchable()
                ->preload(),
                Forms\Components\TextInput::make('phone'),
                Forms\Components\TextInput::make('location'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('supplier.name'),
                Tables\Columns\TextColumn::make('supplier.email'),
                Tables\Columns\TextColumn::make('phone'),
                Tables\Columns\TextColumn::make('location')
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
            'index' => Pages\ListSuppilers::route('/'),
            'create' => Pages\CreateSuppiler::route('/create'),
            'edit' => Pages\EditSuppiler::route('/{record}/edit'),
        ];
    }
}

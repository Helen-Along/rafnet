<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CartsResource\Pages;
use App\Filament\Resources\CartsResource\RelationManagers;
use App\Models\Carts;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CartsResource extends Resource
{
    protected static ?string $model = Carts::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\ToggleColumn::make('delivered'),
                Tables\Columns\CheckboxColumn::make('checkout')->disabled()
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
            'index' => Pages\ListCarts::route('/'),
            'create' => Pages\CreateCarts::route('/create'),
            'edit' => Pages\EditCarts::route('/{record}/edit'),
        ];
    }
}

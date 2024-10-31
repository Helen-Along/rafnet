<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServicesOrderResource\Pages;
use App\Filament\Resources\ServicesOrderResource\RelationManagers;
use App\Models\ServicesOrder;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ServicesOrderResource extends Resource
{
    protected static ?string $model = ServicesOrder::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\Select::make('user_id')
                ->relationship('user', 'name'),
                Forms\Components\Select::make('order_id')
                ->relationship('order','name'),
                Forms\Components\Select::make('delivered')
                ->options([
                    true=>'Yes',
                    false=>'No'
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('user.name'),
                Tables\Columns\TextColumn::make('order.name'),
                Tables\Columns\TextColumn::make('delivered')
                ->badge()
                ->color(fn (bool $state): string => match ($state) {
                    true => 'success',
                    false => 'danger'
                })
                ->formatStateUsing(fn (string $state): string => $state ? 'delivered' : 'pending')
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
            'index' => Pages\ListServicesOrders::route('/'),
            'create' => Pages\CreateServicesOrder::route('/create'),
            'edit' => Pages\EditServicesOrder::route('/{record}/edit'),
        ];
    }
}

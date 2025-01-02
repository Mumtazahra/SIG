<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KabkotaResource\Pages;
use App\Filament\Resources\KabkotaResource\RelationManagers;
use App\Models\Kabkota;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KabkotaResource extends Resource
{
    protected static ?string $model = Kabkota::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(30),
            Forms\Components\TextInput::make('alt_name')
                ->required()
                ->maxLength(30),
            Forms\Components\TextInput::make('latitude')
                ->required()
                ->numeric(),
            Forms\Components\TextInput::make('longitude')
                ->required()
                ->numeric(),
            Forms\Components\TextInput::make('provinsi_id')
                ->required()
                ->options(
                    \App\Models\Provinsi::all()->pluck('name', 'id')
                ),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListKabkotas::route('/'),
            'create' => Pages\CreateKabkota::route('/create'),
            'edit' => Pages\EditKabkota::route('/{record}/edit'),
        ];
    }
}

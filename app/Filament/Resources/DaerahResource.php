<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Daerah;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\DaerahResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\DaerahResource\RelationManagers;

class DaerahResource extends Resource
{
    protected static ?string $model = Daerah::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_daerah')
                ->label('Nama Daerah')
                ->maxLength(100)
                ->required(),

                TextInput::make('provinsi')
                ->label('Provinsi')
                ->maxLength(100)
                ->required(),

                TextInput::make('luas_daerah')
                ->label('Luas Daerah')
                ->suffix('km²')
                ->numeric()
                ->inputMode('decimal')
                ->required(),

                TextInput::make('populasi')
                ->label('Populasi')
                ->numeric()
                ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_daerah')
                ->label("Nama Daerah")
                ->searchable(),

                TextColumn::make('provinsi'),

                TextColumn::make('luas_daerah')
                ->label("Luas Daerah")
                ->suffix(' km²'),

                TextColumn::make('populasi')
                ->numeric(),
            ])
            ->filters([
                SelectFilter::make('nama_daerah')
                ->label('Nama Daerah'),
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
            'index' => Pages\ListDaerahs::route('/'),
            'create' => Pages\CreateDaerah::route('/create'),
            'edit' => Pages\EditDaerah::route('/{record}/edit'),
        ];
    }
}

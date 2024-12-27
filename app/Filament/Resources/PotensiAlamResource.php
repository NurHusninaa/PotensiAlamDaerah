<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\PotensiAlam;
use Filament\Support\RawJs;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PotensiAlamResource\Pages;
use App\Filament\Resources\PotensiAlamResource\RelationManagers;

class PotensiAlamResource extends Resource
{
    protected static ?string $model = PotensiAlam::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('id_daerah')
                ->label('Daerah')
                ->relationship('daerah','nama_daerah')
                ->required(),

                Select::make('id_kategori')
                ->label('Kategori Potensi')
                ->relationship('kategoriPotensi','nama_kategori')
                ->required(),

                TextInput::make('nama_potensi')
                ->label('Nama Potensi')
                ->maxLength(100)
                ->required(),

                Textarea::make('deskripsi')
                ->label('Deskripsi Potensi')
                ->autosize()
                ->minLength(2)
                ->maxLength(2048),

                TextInput::make('nilai_ekonomi')
                ->label('Nilai Ekonomi')
                ->prefix('Rp')
                ->mask(RawJs::make('$money($input)'))
                ->stripCharacters(',')
                ->numeric()
                ->required(),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('daerah.nama_daerah')
                ->label("Nama Daerah")
                ->searchable(),

                TextColumn::make('kategoriPotensi.nama_kategori')
                ->searchable(),
                
                TextColumn::make('nama_potensi')
                ->label("Nama Potensi"),

                TextColumn::make('nilai_ekonomi')
                ->label("Nilai Ekonomi")
                ->prefix('Rp ')
                ->numeric(),

                TextColumn::make('deskripsi')
                ->default("none"),
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
            'index' => Pages\ListPotensiAlams::route('/'),
            'create' => Pages\CreatePotensiAlam::route('/create'),
            'edit' => Pages\EditPotensiAlam::route('/{record}/edit'),
        ];
    }
}

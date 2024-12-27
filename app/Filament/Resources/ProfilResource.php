<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Profil;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Storage;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ProfilResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProfilResource\RelationManagers;

class ProfilResource extends Resource
{
    protected static ?string $model = Profil::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nim')
                ->label('NIM')
                ->maxLength(10)
                ->required(),
                
                TextInput::make('email')
                ->label('Email')
                ->email()
                ->required(),

                TextInput::make('nama')
                ->label('Nama Mahasiswa')
                ->maxLength(100)
                ->required(),

                TextInput::make('kelas')
                ->label('Kelas')
                ->maxLength(100)
                ->required(),

                FileUpload::make('foto_profil')
                ->label('Foto Profil')
                ->image()
                ->maxSize(3072)
                ->imageEditor()
                ->directory("profil")
                ->before(function (Profil $profil) {
                    if ($profil->foto_profil) {
                        Storage::disk('public')->delete($profil->foto_profil);
                    }
                }),

                Textarea::make('alamat')
                ->label('Alamat')
                ->autosize()
                ->minLength(2),

                Textarea::make('deskripsi')
                ->label('Deskripsi')
                ->autosize()
                ->minLength(2)
                ->maxLength(2048),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nim')
                ->label('NIM'),

                TextColumn::make('email')
                ->label('Email'),

                TextColumn::make('nama')
                ->searchable(),

                TextColumn::make('kelas'),

                ImageColumn::make('foto_profil'),

                TextColumn::make('alamat')
                ->default("none")
                ->limit(50),

                TextColumn::make('deskripsi')
                ->default("none")
                ->limit(50),
            ])
            ->filters([
                SelectFilter::make('nama')
                ->label('Nama'),
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
            'index' => Pages\ListProfils::route('/'),
            'create' => Pages\CreateProfil::route('/create'),
            'edit' => Pages\EditProfil::route('/{record}/edit'),
        ];
    }
}

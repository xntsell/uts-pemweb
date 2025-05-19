<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\CafeResource\Pages;
use App\Filament\Admin\Resources\CafeResource\RelationManagers;
use App\Models\Cafe;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CafeResource extends Resource
{
    protected static ?string $model = Cafe::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id_pelanggan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nama_pelanggan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('jenis_kelamin')
                    ->required()
                    ->maxLength(1),
                Forms\Components\TextInput::make('jumlah_kunjungan')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('minuman_favorit')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('total_pembelian')
                    ->required()
                    ->numeric(),
                Forms\Components\Toggle::make('member')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_pelanggan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_pelanggan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jenis_kelamin')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jumlah_kunjungan')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('minuman_favorit')
                    ->searchable(),
                Tables\Columns\TextColumn::make('total_pembelian')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('member')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListCafes::route('/'),
            'create' => Pages\CreateCafe::route('/create'),
            'edit' => Pages\EditCafe::route('/{record}/edit'),
        ];
    }
}

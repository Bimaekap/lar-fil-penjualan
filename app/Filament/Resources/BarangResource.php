<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BarangResource\Pages;
use App\Filament\Resources\BarangResource\RelationManagers;
use App\Models\Barang;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Forms\Components\Section;

class BarangResource extends Resource
{
    protected static ?string $model = Barang::class;

    // ganti icon navigasi
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $label = 'Tabel Barang ';
    protected static ?string $navigationLabel = 'Data Barang';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make()
                            ->schema([
                                TextInput::make('nama')
                                    ->columnSpan('full')
                                    ->required(),
                                TextInput::make('harga')
                                    ->columnSpan('full')
                                    ->required(),
                                TextInput::make('stok')
                                    ->columnSpan('full')
                                    ->required(),
                                MarkdownEditor::make('deskripsi')
                                    ->columnSpan('full')
                                    ->required(),
                            ])->columns(2)
                    ]),
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Group::make()
                            ->schema([
                                Forms\Components\Section::make('Gambar')
                                    ->schema([
                                        FileUpload::make('gambar')
                                            ->preserveFilenames()
                                            ->required()
                                            ->downloadable()
                                    ])->collapsible()
                            ]),

                    ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('harga'),
                Tables\Columns\TextColumn::make('stok'),
                Tables\Columns\TextColumn::make('deskripsi'),
                Tables\Columns\ImageColumn::make('gambar')->width(100),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }


    // TODO : PERBAIKI 
    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([

                Infolists\Components\TextEntry::make('nama'),
                Infolists\Components\TextEntry::make('harga'),
                Infolists\Components\TextEntry::make('stok'),
                Infolists\Components\TextEntry::make('deskripsi'),
                Infolists\Components\ImageEntry::make('gambar')
                    ->columnSpanFull(),

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
            'index' => Pages\ListBarangs::route('/'),
            'create' => Pages\CreateBarang::route('/create'),
            'edit' => Pages\EditBarang::route('/{record}/edit'),
        ];
    }
}

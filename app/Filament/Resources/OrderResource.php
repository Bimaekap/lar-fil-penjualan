<?php

namespace App\Filament\Resources;

use App\Filament\Exports\OrderExporter;
use Filament\Forms;
use Filament\Tables;
use App\Models\Order;
use Filament\Infolists;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use App\Filament\Resources\OrderResource\Pages;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\HtmlString;
use Filament\Infolists\Components\Section;
use Filament\Tables\Actions\ExportAction;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $label = 'Tabel Pesanan ';
    protected static ?string $navigationLabel = 'Data Pesanan';

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    protected function getHeaderAction()
    {
        return [
            $this->getCreateFormAction()
                ->formId['form'],
        ];
    }
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
                Tables\Columns\TextColumn::make('username'),
                Tables\Columns\TextColumn::make('nama_barang'),
                Tables\Columns\TextColumn::make('harga'),
                Tables\Columns\TextColumn::make('jumlah'),
                Tables\Columns\TextColumn::make('total'),
                Tables\Columns\TextColumn::make('no_pesanan')
                    ->searchable(),
                TextColumn::make('gambar')
                    ->getStateUsing(function (Order $record) {
                        return "<img src='/storage/$record->gambar')' alt='gambar' style='width: 150px; height: auto;' />";
                    })->html()
                    ->width(100),
            ])
            ->filters([
                //
            ])

            ->actions([
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->headerActions([
                ExportAction::make()
                    ->exporter(OrderExporter::class)
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\TextEntry::make('username')
                    ->label('Nama Pembeli'),
                Infolists\Components\TextEntry::make('total')
                    ->label('Total Bayar'),
                Infolists\Components\TextEntry::make('nama_barang'),
                Infolists\Components\TextEntry::make('harga')
                    ->label('Harga/1 Barang'),
                Infolists\Components\TextEntry::make('jumlah')
                    ->label('Jumlah Pesanan'),
                Section::make('Kelengkapan')
                    ->schema([
                        Section::make('QR CODE')
                            ->schema([
                                Infolists\Components\ImageEntry::make('qr_code')
                                    ->label('Qr Code')
                                    ->label(fn(Order $record) => new HtmlString("<img src='/storage/$record->qr_code.png')' alt='barcode' style='width: 150px; height: auto;' />"))
                                    ->columnSpan(1),
                            ])->columnSpan(1),
                        Section::make('Gambar')
                            ->schema([
                                Infolists\Components\ImageEntry::make('qr_code')
                                    ->label('Qr Code')
                                    ->label(fn(Order $record) => new HtmlString("<img src='/storage/$record->gambar')' alt='barcode' style='width: 150px; height: auto;' />"))
                                    ->columnSpan(1),
                            ])->columnSpan(1),
                    ])->columns(2)
            ])->columns(2);
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
            'view' => Pages\ViewQrcode::route('{record}')
            // 'qr-code' => Pages\ViewQrcode::route('/{record}/qrcode')
        ];
    }
}

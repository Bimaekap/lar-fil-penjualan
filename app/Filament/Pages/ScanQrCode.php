<?php

namespace App\Filament\Pages;


use App\Models\Order;
use Filament\Pages\Page;

class ScanQrCode extends Page
{

    protected static ?string $model = Order::class;
    protected static ?string $navigationIcon = 'heroicon-o-qr-code';

    protected static string $view = 'filament.pages.scan-qr-code';
}

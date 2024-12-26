<?php

namespace App\Tables\Columns;

use Illuminate\Database\Eloquent\Model;

use App\Models\Order;
use Filament\Tables\Columns\Column;
use Milon\Barcode\DNS1D;

class QrcodeOrder extends Column
{
    protected string $view = 'tables.columns.qrcode-order';
}

<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewQrcode extends ViewRecord
{

    protected static string $resource = OrderResource::class;
    // protected static string $url = OrderResource::getUrl('view');

    // public static function ambilUrl()
    // {
    //     echo url()->current();
    // }
}

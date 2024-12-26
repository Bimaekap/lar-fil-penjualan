<?php

namespace App\Providers;

use Illuminate\View\View;
use Filament\View\PanelsRenderHook;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Filament\Support\Facades\FilamentView;
use Illuminate\Routing\Route;
use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Assets\Js;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // FilamentView::registerRenderHook(
        //     PanelsRenderHook::PAGE_HEADER_ACTIONS_AFTER,
        //     fn(): View => view('filament.pages.scan-qr-code'),
        // );
        FilamentAsset::register([
            Js::make('custom-script', __DIR__ . '/../../resources/js/js-scripts.js'),
        ]);
    }
}

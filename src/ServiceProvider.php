<?php

namespace GeoffTech\FilamentTools;

use Filament\Forms\Components\TextInput;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        TextInput::configureUsing(modifyUsing: fn($c) => $c->maxLength(255));

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'filament-tools');
    }
}

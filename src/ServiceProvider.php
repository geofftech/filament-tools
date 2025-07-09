<?php

namespace GeoffTech\FilamentTools;

use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        TextInput::configureUsing(
            modifyUsing: fn($c) => $c->maxLength(
                fn(Component $component) => $component->isNumeric()
                    ? null
                    : 255
            )
        );

        // ! temp fix: disableToolbarButtons broken
        // RichEditor::configureUsing(
        //     modifyUsing: fn($c) => $c->disableToolbarButtons(['attachFiles'])
        // );

        // ! temp fix: disableToolbarButtons broken
        // MarkdownEditor::configureUsing(
        //     modifyUsing: fn($c) => $c->disableToolbarButtons(['attachFiles'])
        // );

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'filament-tools');
    }
}

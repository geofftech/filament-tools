<?php

namespace GeoffTech\FilamentTools\Actions;

use Filament\Actions\Action;

class LinkSelectAction
{
    public static function make($name, $linkForm): Action
    {
        return Action::make($name . '_link')
            ->iconButton()
            ->icon('heroicon-m-arrow-top-right-on-square')
            ->url(fn($get) => $linkForm::getUrl(['record' => $get($name)]))
            ->visible(fn($get) => (bool) $get($name));
    }
}

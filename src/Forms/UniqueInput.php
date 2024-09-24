<?php

namespace GeoffTech\FilamentTools\Forms;

use Filament\Forms\Components\TextInput;

class UniqueInput
{
    public static function make(string $name): TextInput
    {
        return TextInput::make($name)
            ->required()
            ->maxLength(255)
            ->unique(ignoreRecord: true);
    }
}

<?php

namespace GeoffTech\FilamentTools\Forms;

use Filament\Forms\Components\TextInput;

class UniqueInput extends TextInput
{
    public function setUp(): void
    {
        parent::setUp();

        $this
            ->required()
            ->maxLength(255)
            ->unique(ignoreRecord: true);
    }
}

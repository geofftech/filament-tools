<?php

namespace GeoffTech\FilamentTools\Sections;

use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;

class NotesSection extends Section
{
    protected function setup(): void
    {
        parent::setup();

        $this->columnSpanFull()
            ->schema([

                Textarea::make('notes')
                    ->hiddenLabel()
                    ->columnSpanFull(),

            ])
            ->collapsible()
            ->collapsed(
                fn(Get $get) => blank($get('notes'))
            );
    }
}

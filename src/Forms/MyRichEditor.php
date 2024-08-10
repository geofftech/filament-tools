<?php

namespace GeoffTech\FilamentTools\Forms;

use Filament\Forms\Components\RichEditor;

class MyRichEditor
{
    public static function make(string $name): RichEditor
    {
        return RichEditor::make($name)
            ->disableToolbarButtons(['attachFiles']);
    }
}

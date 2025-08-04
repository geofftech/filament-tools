<?php

namespace GeoffTech\FilamentTools\Forms;

use Filament\Forms\Components\FileUpload;

class ImageUpload extends FileUpload
{
    public function setUp(): void
    {
        parent::setUp();

        $this
            ->image()
            ->imageEditor()
            ->downloadable();
    }
}

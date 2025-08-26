<?php

namespace GeoffTech\FilamentTools\Forms;

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

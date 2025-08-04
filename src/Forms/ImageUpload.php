<?php

namespace GeoffTech\FilamentTools\Forms;

use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Model;

class ImageUpload extends FileUpload
{
    public function setUp(): void
    {
        parent::setUp();

        $this
            ->directory(function (Model $record) {
                return $record->getTable() . '/' . $this->name;
            })
            ->image()
            ->imageEditor()
            ->downloadable();
    }
}

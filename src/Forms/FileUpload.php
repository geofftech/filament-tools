<?php

namespace GeoffTech\FilamentTools\Forms;

use Filament\Forms\Components\FileUpload as BaseFileUpload;
use Illuminate\Database\Eloquent\Model;

class FileUpload extends BaseFileUpload
{
    public function setUp(): void
    {
        parent::setUp();

        $this
            ->directory(function (Model $record) {
                return $record->getTable() . '/' . $this->name;
            })
            ->downloadable();
    }
}

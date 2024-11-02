<?php

namespace GeoffTech\FilamentTools\Forms;

use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Model;

class ImageUpload
{
    public static function make(string $name): FileUpload
    {
        return FileUpload::make($name)
            ->directory(function (Model $record) use ($name) {
                return $record->getTable() . '/' . $name;
            })
            ->image()
            ->imageEditor()
            ->downloadable();
    }
}

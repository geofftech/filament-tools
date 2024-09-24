<?php

namespace GeoffTech\FilamentTools\Tables;

use Filament\Tables\Columns\ImageColumn;

class MyImageColumn
{
    public static function make(string $name)
    {
        return ImageColumn::make($name)
            ->label('')
            ->alignCenter()
            ->extraHeaderAttributes(['class' => 'w-0'])
            ->width(50)
            ->height(50);
    }
}

<?php

namespace GeoffTech\FilamentTools\Tables;

use Filament\Tables\Columns\IconColumn;

class MyBooleanColumn
{
    public static function make(string $name): IconColumn
    {
        return IconColumn::make($name)
            ->boolean()
            ->label('')
            ->alignCenter()
            ->extraHeaderAttributes(['class' => 'w-0'])
            ->grow(false);
    }
}

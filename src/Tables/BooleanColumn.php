<?php

namespace GeoffTech\FilamentTools\Tables;

use Filament\Tables\Columns\IconColumn;

class BooleanColumn extends IconColumn
{
    public function setUp(): void
    {
        $this
            ->boolean()
            ->label('')
            ->alignCenter()
            ->extraHeaderAttributes(['class' => 'w-0'])
            ->grow(false);
    }
}

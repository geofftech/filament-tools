<?php

namespace GeoffTech\FilamentTools\Tables;

use Filament\Tables\Columns\IconColumn;

class BooleanColumn extends IconColumn
{
    public function setUp(): void
    {
        parent::setUp();

        $this
            ->boolean()
            ->label('')
            ->alignCenter()
            ->extraHeaderAttributes(['class' => 'w-0'])
            ->width(50)
            ->grow(false);
    }
}

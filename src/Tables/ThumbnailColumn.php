<?php

namespace GeoffTech\FilamentTools\Tables;

use Filament\Tables\Columns\ImageColumn;

class ThumbnailColumn extends ImageColumn
{
    public function setUp(): void
    {
        parent::setUp();

        $this
            ->label('')
            ->alignCenter()
            ->extraHeaderAttributes(['class' => 'w-0'])
            ->width(50)
            ->grow(false);
    }
}

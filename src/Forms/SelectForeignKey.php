<?php

namespace GeoffTech\FilamentTools\Forms;

use Filament\Forms\Components\Select;
use GeoffTech\FilamentTools\Helpers\FilamentFormHelper;

class SelectForeignKey
{
  public static function make($name, $model, $linkForm)
  {
    return Select::make($name)
      ->required()
      ->searchable()
      ->options($model::all()->sortBy('name')->pluck('name', 'id'))
      ->suffix(fn() => FilamentFormHelper::LinkReferencedItem($form, $name, $linkForm));
  }
}

<?php

namespace GeoffTech\FilamentTools\Forms;

use Filament\Forms\Components\Select;
use GeoffTech\FilamentTools\Helpers\FormHelper;

class SelectForeignKey
{
  public static function make($name, $model, $form, $linkForm): Select
  {
    return Select::make($name)
      // ->required()
      ->searchable()
      ->options($model::all()->sortBy('name')->pluck('name', 'id'))
      ->suffix(fn() => FormHelper::LinkReferencedItem($form, $name, $linkForm));
  }
}

<?php

namespace GeoffTech\FilamentTools\Forms;

use Filament\Forms\Components\Select;
use GeoffTech\FilamentTools\Forms\LinkSelectAction;

class SelectModel
{
  public static function make(string $name, $model, $linkForm = null, $titleAttribute = 'name', $idAttribute = 'id'): Select
  {
    $select = Select::make($name)
      ->searchable()
      ->options(
        $model::all()
          ->sortBy($titleAttribute)
          ->pluck($titleAttribute, $idAttribute),
      );

    if ($linkForm) {
      $select->suffixAction(LinkSelectAction::make($name, $linkForm));
    }

    return $select;
  }
}

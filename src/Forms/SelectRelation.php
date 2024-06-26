<?php

namespace GeoffTech\FilamentTools\Forms;

use Filament\Forms\Components\Select;
use GeoffTech\FilamentTools\Forms\LinkSelectAction;

class SelectRelation
{
  public static function make(string $name, ?string $relation, $linkForm = null, $titleAttribute = 'name'): Select
  {
    if (!$relation) {
      // remove '_id' and convert to camel case - business_unit_id -> businessUnit
      $relation = str(substr($name, 0, -3))->camel();
    }

    $select = Select::make($name)
      ->searchable()
      ->live()
      ->relationship($relation, $titleAttribute)
      ->preload();

    if ($linkForm) {
      $select->suffixAction(LinkSelectAction::make($name, $linkForm));
    }

    return $select;
  }
}

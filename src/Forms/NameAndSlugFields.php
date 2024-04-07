<?php

namespace GeoffTech\FilamentTools\Forms;

use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Filament\Forms\Set;

class NameAndSlugFields
{

  public static function make()
  {
    return [

      TextInput::make('name')
        ->required()
        ->maxLength(100)
        ->unique(ignoreRecord: true)
        ->live(onBlur: true)
        ->afterStateUpdated(function (Get $get, Set $set, ?string $state, $context) {
          if ($context === 'edit' && $get('slug') && !$get('is_slug_automatic')) {
            return;
          }
          $set('is_slug_automatic', true);
          $set('slug', str($state)->slug());
        })
        ->debounce(),

      TextInput::make('slug')
        ->required()
        ->maxLength(100)
        ->unique(ignoreRecord: true)
        ->rules(['alpha_dash'])
        ->afterStateUpdated(function (Set $set) {
          $set('is_slug_automatic', false);
        })
        ->debounce(),

      Hidden::make('is_slug_automatic')
        ->default(false)
        ->dehydrated(false),

    ];
  }


}
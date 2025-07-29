<?php

namespace GeoffTech\FilamentTools\Sections;

use Closure;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;

class NameAndSlugSection
{
    public static function make(?Closure $modifyRuleUsing = null): Section
    {
        return Section::make()
            ->schema([

                TextInput::make('name')
                    ->required()
                    ->maxLength(100)
                    ->unique(
                        ignoreRecord: true,
                        modifyRuleUsing: $modifyRuleUsing,
                    )
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (Get $get, Set $set, ?string $state, $context) {
                        if ($context === 'edit' && $get('slug') && !$get('is_slug_automatic')) {
                            return;
                        }
                        $slug = str($state)->slug()->toString();
                        $set('is_slug_automatic', true);
                        $set('slug', $slug);
                    })
                    ->debounce(),

                TextInput::make('slug')
                    ->label('Unique Slug for URL')
                    ->required()
                    ->maxLength(100)
                    ->unique(
                        ignoreRecord: true,
                        modifyRuleUsing: $modifyRuleUsing,
                    )
                    ->rules(['alpha_dash'])
                    ->afterStateUpdated(function (Set $set) {
                        $set('is_slug_automatic', false);
                    })
                    ->debounce(),

                Hidden::make('is_slug_automatic')
                    ->default(false)
                    ->dehydrated(false),

            ]);
    }
}

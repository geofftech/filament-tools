<?php

namespace GeoffTech\FilamentTools\Forms;

use Filament\Forms\Components\Select;

class SelectEnum extends Select
{
    public function getOptions(): array
    {
        $options = $this->evaluate($this->options) ?? [];

        if (
            is_string($options) &&
            enum_exists($enum = $options)
        ) {

            return array_reduce(
                $enum::cases(),
                function (array $carry, $case): array {

                    $text = method_exists($case, 'getLabel')
                        ? $case->getLabel() ?? $case->name
                        : $case->name;

                    $icon = method_exists($case, 'getIcon')
                        ? $case->getIcon()
                        : null;

                    $color = method_exists($case, 'getColor')
                        ? $case->getColor()
                        : null;

                    $html = view('select-enum', [
                        'text' => $text,
                        'icon' => $icon,
                        'color' => $color,
                    ])->render();

                    $carry[$case?->value ?? $case->name] = $html;

                    return $carry;
                },
                []
            );
        }

        return parent::getOptions();
    }

    protected function setup(): void
    {
        parent::setup();

        $this->allowHtml()
            ->native(false);
    }
}

@dump($text, $icon, $color)
@dump(\Filament\Support\get_color_css_variables($color, shades: [500]))

<span
    class="inline-flex items-center gap-1 text-custom-600"
    @style([\Filament\Support\get_color_css_variables($color, shades: [600])])
>
    @if ($icon)
        <x-filament::icon :icon="$icon" class="h-5 w-5" />
    @endif

    {{ $text }}
</span>

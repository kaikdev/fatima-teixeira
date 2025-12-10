<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class TextIntroduction extends Widget
{
    protected int | string | array $columnSpan = 'full';


    protected string $view = 'filament.widgets.text-introduction';
}

<?php

namespace BotMan\LineBot\Showcase;

use BotMan\Drivers\Line\Extensions\Templates\Buttons;
use BotMan\Drivers\Line\Extensions\Templates\Carousel;
use BotMan\Drivers\Line\Extensions\Templates\CarouselColumn;
use BotMan\Drivers\Line\Extensions\Templates\Actions\TemplateAction;

class TemplateHelper
{
    public static function buttons(): Buttons
    {
        return Buttons::create('\u0e40\u0e25\u0e37\u0e2d\u0e01\u0e01\u0e32\u0e23\u0e14\u0e33\u0e40\u0e19\u0e34\u0e19\u0e01\u0e32\u0e23')
            ->title('Template Demo')
            ->thumbnailImageUrl('https://via.placeholder.com/300')
            ->addAction(TemplateAction::create()->message('\u0e2a\u0e27\u0e31\u0e2a\u0e14\u0e35', '\u0e2a\u0e27\u0e31\u0e2a\u0e14\u0e35'))
            ->addAction(TemplateAction::create()->postback('\u0e2a\u0e48\u0e07\u0e02\u0e49\u0e2d\u0e21\u0e39\u0e25', 'action=test'))
            ->addAction(TemplateAction::create()->uri('\u0e40\u0e1b\u0e34\u0e14\u0e40\u0e27\u0e47\u0e1a', 'https://example.com'));
    }

    public static function carousel(): Carousel
    {
        return Carousel::create('Carousel Demo')
            ->addColumn(
                CarouselColumn::create('\u0e15\u0e31\u0e27\u0e40\u0e25\u0e37\u0e2d\u0e01\u0e17\u0e35\u0e48 1')
                    ->title('Option A')
                    ->addAction(TemplateAction::create()->message('\u0e40\u0e25\u0e37\u0e2d\u0e01 A', 'A'))
            )
            ->addColumn(
                CarouselColumn::create('\u0e15\u0e31\u0e27\u0e40\u0e25\u0e37\u0e2d\u0e01\u0e17\u0e35\u0e48 2')
                    ->title('Option B')
                    ->addAction(TemplateAction::create()->message('\u0e40\u0e25\u0e37\u0e2d\u0e01 B', 'B'))
            )
            ->addColumn(
                CarouselColumn::create('\u0e15\u0e31\u0e27\u0e40\u0e25\u0e37\u0e2d\u0e01\u0e17\u0e35\u0e48 3')
                    ->title('Option C')
                    ->addAction(TemplateAction::create()->message('\u0e40\u0e25\u0e37\u0e2d\u0e01 C', 'C'))
            );
    }
}

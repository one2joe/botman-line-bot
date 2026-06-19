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
        return Buttons::create('เลือกการดำเนินการ')
            ->title('Template Demo')
            ->thumbnailImageUrl('https://via.placeholder.com/300')
            ->addAction(TemplateAction::create()->message('สวัสดี', 'สวัสดี'))
            ->addAction(TemplateAction::create()->postback('ส่งข้อมูล', 'action=test'))
            ->addAction(TemplateAction::create()->uri('เปิดเว็บ', 'https://example.com'));
    }

    public static function carousel(): Carousel
    {
        return Carousel::create('Carousel Demo')
            ->addColumn(
                CarouselColumn::create('ตัวเลือกที่ 1')
                    ->title('Option A')
                    ->addAction(TemplateAction::create()->message('เลือก A', 'A'))
            )
            ->addColumn(
                CarouselColumn::create('ตัวเลือกที่ 2')
                    ->title('Option B')
                    ->addAction(TemplateAction::create()->message('เลือก B', 'B'))
            )
            ->addColumn(
                CarouselColumn::create('ตัวเลือกที่ 3')
                    ->title('Option C')
                    ->addAction(TemplateAction::create()->message('เลือก C', 'C'))
            );
    }
}

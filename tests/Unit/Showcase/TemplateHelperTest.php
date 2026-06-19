<?php

namespace BotMan\LineBot\Tests\Unit\Showcase;

use BotMan\Drivers\Line\Extensions\Templates\Buttons;
use BotMan\Drivers\Line\Extensions\Templates\Carousel;
use BotMan\LineBot\Showcase\TemplateHelper;
use PHPUnit\Framework\TestCase;

class TemplateHelperTest extends TestCase
{
    public function test_buttons_returns_buttons_instance()
    {
        $result = TemplateHelper::buttons();
        $this->assertInstanceOf(Buttons::class, $result);

        $array = $result->toArray();
        $this->assertEquals('template', $array['type']);
        $this->assertEquals('buttons', $array['template']['type']);
    }

    public function test_carousel_returns_carousel_instance()
    {
        $result = TemplateHelper::carousel();
        $this->assertInstanceOf(Carousel::class, $result);

        $array = $result->toArray();
        $this->assertEquals('template', $array['type']);
        $this->assertEquals('carousel', $array['template']['type']);
        $this->assertCount(3, $array['template']['columns']);
    }
}

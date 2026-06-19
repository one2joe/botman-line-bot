<?php

namespace BotMan\LineBot\Tests\Unit\Showcase;

use BotMan\LineBot\Showcase\FlexMessageHelper;
use PHPUnit\Framework\TestCase;

class FlexMessageHelperTest extends TestCase
{
    public function test_sampleBubble_returns_valid_flex_structure()
    {
        $result = FlexMessageHelper::sampleBubble();

        $this->assertIsArray($result);
        $this->assertEquals('flex', $result['type']);
        $this->assertEquals('Flex Demo', $result['altText']);
        $this->assertEquals('bubble', $result['contents']['type']);
        $this->assertArrayHasKey('header', $result['contents']);
        $this->assertArrayHasKey('body', $result['contents']);
        $this->assertArrayHasKey('footer', $result['contents']);
    }
}

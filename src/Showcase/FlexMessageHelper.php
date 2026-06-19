<?php

namespace BotMan\LineBot\Showcase;

class FlexMessageHelper
{
    public static function sampleBubble(): array
    {
        return [
            'type' => 'flex',
            'altText' => 'Flex Demo',
            'contents' => [
                'type' => 'bubble',
                'header' => [
                    'type' => 'box',
                    'layout' => 'vertical',
                    'contents' => [
                        ['type' => 'text', 'text' => 'LINE BotMan', 'weight' => 'bold', 'size' => 'xl'],
                    ],
                ],
                'body' => [
                    'type' => 'box',
                    'layout' => 'vertical',
                    'contents' => [
                        ['type' => 'text', 'text' => 'สวัสดีจาก Flex Message!'],
                        ['type' => 'text', 'text' => 'This is a Flex Message demo.'],
                        ['type' => 'separator'],
                        ['type' => 'text', 'text' => 'PHP + BotMan + LINE'],
                        ['type' => 'text', 'text' => 'Version 1.0.0', 'color' => '#aaaaaa', 'size' => 'xs'],
                    ],
                ],
                'footer' => [
                    'type' => 'box',
                    'layout' => 'vertical',
                    'contents' => [
                        [
                            'type' => 'button',
                            'action' => [
                                'type' => 'message',
                                'label' => 'เริ่มใหม่',
                                'text' => '/help',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}

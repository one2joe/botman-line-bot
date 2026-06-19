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
                        ['type' => 'text', 'text' => '\u0e2a\u0e27\u0e31\u0e2a\u0e14\u0e35\u0e08\u0e32\u0e01 Flex Message!'],
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
                                'label' => '\u0e40\u0e23\u0e34\u0e48\u0e21\u0e43\u0e2b\u0e21\u0e48',
                                'text' => '/help',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}

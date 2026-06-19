<?php

namespace BotMan\LineBot\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\Drivers\Line\Extensions\Templates\Buttons;
use BotMan\Drivers\Line\Extensions\Templates\Actions\TemplateAction;

class TutorialConversation extends Conversation
{
    protected int $step = 1;

    public function run()
    {
        $this->step1();
    }

    public function step1()
    {
        $this->say('\u0e21\u0e32\u0e40\u0e23\u0e34\u0e48\u0e21\u0e40\u0e23\u0e35\u0e22\u0e19\u0e23\u0e39\u0e49\u0e01\u0e31\u0e19\u0e40\u0e25\u0e22! Step 1: \u0e1e\u0e34\u0e21\u0e1e\u0e4c /\u0e40\u0e1f\u0e25\u0e47\u0e01\u0e0b\u0e4c \u0e2b\u0e23\u0e37\u0e2d /flex');

        $this->ask('\u0e1e\u0e34\u0e21\u0e1e\u0e4c /\u0e40\u0e1f\u0e25\u0e47\u0e01\u0e0b\u0e4c \u0e40\u0e1e\u0e37\u0e48\u0e2d\u0e14\u0e39 Flex Message', function (Answer $answer) {
            $text = $answer->getText();
            if (in_array($text, ['/\u0e40\u0e1f\u0e25\u0e47\u0e01\u0e0b\u0e4c', '/flex', '\u0e40\u0e1f\u0e25\u0e47\u0e01\u0e0b\u0e4c', 'flex'], true)) {
                $this->say('\u0e40\u0e22\u0e35\u0e48\u0e22\u0e21! \u0e21\u0e32\u0e14\u0e39\u0e02\u0e31\u0e49\u0e19\u0e15\u0e2d\u0e19\u0e15\u0e48\u0e2d\u0e44\u0e1b');
                $this->step2();
            } else {
                $this->say('\u0e25\u0e2d\u0e07\u0e1e\u0e34\u0e21\u0e1e\u0e4c /\u0e40\u0e1f\u0e25\u0e47\u0e01\u0e0b\u0e4c \u0e2b\u0e23\u0e37\u0e2d /flex');
                $this->step1();
            }
        });
    }

    public function step2()
    {
        $this->say('Step 2: \u0e1e\u0e34\u0e21\u0e1e\u0e4c /\u0e40\u0e17\u0e21\u0e40\u0e1e\u0e25\u0e15 \u0e2b\u0e23\u0e37\u0e2d /template');

        $this->ask('\u0e1e\u0e34\u0e21\u0e1e\u0e4c /\u0e40\u0e17\u0e21\u0e40\u0e1e\u0e25\u0e15 \u0e40\u0e1e\u0e37\u0e48\u0e2d\u0e14\u0e39 Template', function (Answer $answer) {
            $text = $answer->getText();
            if (in_array($text, ['/\u0e40\u0e17\u0e21\u0e40\u0e1e\u0e25\u0e15', '/template', '\u0e40\u0e17\u0e21\u0e40\u0e1e\u0e25\u0e15', 'template'], true)) {
                $this->say('\u0e40\u0e01\u0e48\u0e07\u0e21\u0e32\u0e01!');
                $this->step3();
            } else {
                $this->say('\u0e25\u0e2d\u0e07\u0e1e\u0e34\u0e21\u0e1e\u0e4c /\u0e40\u0e17\u0e21\u0e40\u0e1e\u0e25\u0e15 \u0e2b\u0e23\u0e37\u0e2d /template');
                $this->step2();
            }
        });
    }

    public function step3()
    {
        $this->say('Step 3: \u0e1e\u0e34\u0e21\u0e1e\u0e4c /\u0e0a\u0e37\u0e48\u0e2d \u0e2b\u0e23\u0e37\u0e2d /name');

        $this->ask('\u0e1e\u0e34\u0e21\u0e1e\u0e4c /\u0e0a\u0e37\u0e48\u0e2d \u0e40\u0e1e\u0e37\u0e48\u0e2d\u0e15\u0e31\u0e49\u0e07\u0e0a\u0e37\u0e48\u0e2d\u0e02\u0e2d\u0e07\u0e04\u0e38\u0e13', function (Answer $answer) {
            $text = $answer->getText();
            if (in_array($text, ['/\u0e0a\u0e37\u0e48\u0e2d', '/name', '\u0e0a\u0e37\u0e48\u0e2d', 'name'], true)) {
                $this->say('\u0e15\u0e48\u0e2d\u0e44\u0e1b!');
                $this->step4();
            } else {
                $this->say('\u0e25\u0e2d\u0e07\u0e1e\u0e34\u0e21\u0e1e\u0e4c /\u0e0a\u0e37\u0e48\u0e2d \u0e2b\u0e23\u0e37\u0e2d /name');
                $this->step3();
            }
        });
    }

    public function step4()
    {
        $this->say('Step 4: \u0e2a\u0e48\u0e07\u0e2a\u0e15\u0e34\u0e01\u0e40\u0e01\u0e2d\u0e23\u0e4c\u0e21\u0e32\u0e43\u0e2b\u0e49\u0e09\u0e31\u0e19\u0e14\u0e39\u0e2a\u0e34!');

        $this->ask('\u0e2a\u0e48\u0e07\u0e2a\u0e15\u0e34\u0e01\u0e40\u0e01\u0e2d\u0e23\u0e4c\u0e21\u0e32', function (Answer $answer) {
            $stickerPatterns = ['__sticker__', '%%%_FILE_%%%'];
            if (in_array($answer->getText(), $stickerPatterns, true)) {
                $this->say('\u0e40\u0e22\u0e35\u0e48\u0e22\u0e21\u0e21\u0e32\u0e01! \u0e19\u0e48\u0e32\u0e23\u0e31\u0e01\u0e08\u0e31\u0e07!');
                $this->step5();
            } else {
                $this->say('\u0e25\u0e2d\u0e07\u0e2a\u0e48\u0e07\u0e2a\u0e15\u0e34\u0e01\u0e40\u0e01\u0e2d\u0e23\u0e4c\u0e21\u0e32');
                $this->step4();
            }
        });
    }

    public function step5()
    {
        $this->say("\u0e40\u0e23\u0e35\u0e22\u0e19\u0e08\u0e1a\u0e41\u0e25\u0e49\u0e27! \u0e25\u0e2d\u0e07\u0e1e\u0e34\u0e21\u0e1e\u0e4c /\u0e40\u0e21\u0e19\u0e39 \u0e40\u0e1e\u0e37\u0e48\u0e2d\u0e14\u0e39\u0e17\u0e31\u0e49\u0e07\u0e2b\u0e21\u0e14");
        $this->stopsConversation();
    }
}

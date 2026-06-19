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
        $this->say('มาเริ่มเรียนรู้กันเลย! Step 1: พิมพ์ /เฟล็กซ์ หรือ /flex');

        $this->ask('พิมพ์ /เฟล็กซ์ เพื่อดู Flex Message', function (Answer $answer) {
            $text = $answer->getText();
            if (in_array($text, ['/เฟล็กซ์', '/flex', 'เฟล็กซ์', 'flex'], true)) {
                $this->say('เยี่ยม! มาดูขั้นตอนต่อไป');
                $this->step2();
            } else {
                $this->say('ลองพิมพ์ /เฟล็กซ์ หรือ /flex');
                $this->step1();
            }
        });
    }

    public function step2()
    {
        $this->say('Step 2: พิมพ์ /เทมเพลต หรือ /template');

        $this->ask('พิมพ์ /เทมเพลต เพื่อดู Template', function (Answer $answer) {
            $text = $answer->getText();
            if (in_array($text, ['/เทมเพลต', '/template', 'เทมเพลต', 'template'], true)) {
                $this->say('เก่งมาก!');
                $this->step3();
            } else {
                $this->say('ลองพิมพ์ /เทมเพลต หรือ /template');
                $this->step2();
            }
        });
    }

    public function step3()
    {
        $this->say('Step 3: พิมพ์ /ชื่อ หรือ /name');

        $this->ask('พิมพ์ /ชื่อ เพื่อตั้งชื่อของคุณ', function (Answer $answer) {
            $text = $answer->getText();
            if (in_array($text, ['/ชื่อ', '/name', 'ชื่อ', 'name'], true)) {
                $this->say('ต่อไป!');
                $this->step4();
            } else {
                $this->say('ลองพิมพ์ /ชื่อ หรือ /name');
                $this->step3();
            }
        });
    }

    public function step4()
    {
        $this->say('Step 4: ส่งสติกเกอร์มาให้ฉันดูสิ!');

        $this->ask('ส่งสติกเกอร์มา', function (Answer $answer) {
            $stickerPatterns = ['__sticker__', '%%%_FILE_%%%'];
            if (in_array($answer->getText(), $stickerPatterns, true)) {
                $this->say('เยี่ยมมาก! น่ารักจัง!');
                $this->step5();
            } else {
                $this->say('ลองส่งสติกเกอร์มา');
                $this->step4();
            }
        });
    }

    public function step5()
    {
        $this->say("เรียนจบแล้ว! ลองพิมพ์ /เมนู เพื่อดูทั้งหมด");
        $this->stopsConversation();
    }
}

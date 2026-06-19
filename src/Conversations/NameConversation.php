<?php

namespace BotMan\LineBot\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;

class NameConversation extends Conversation
{
    public function askName()
    {
        $this->ask('ชื่ออะไรครับ / What\'s your name?', function (Answer $answer) {
            $name = $answer->getText();
            $this->user->save(['name' => $name]);
            $this->say("ยินดีที่ได้รู้จัก {$name}! / Nice to meet you, {$name}!");
            $this->stopsConversation();
        });
    }

    public function run()
    {
        $this->askName();
    }
}

<?php

namespace BotMan\LineBot\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;

class NameConversation extends Conversation
{
    public function askName()
    {
        $this->ask('\u0e0a\u0e37\u0e48\u0e2d\u0e2d\u0e30\u0e44\u0e23\u0e04\u0e23\u0e31\u0e1a / What\'s your name?', function (Answer $answer) {
            $name = $answer->getText();
            $this->user->save(['name' => $name]);
            $this->say("\u0e22\u0e34\u0e19\u0e14\u0e35\u0e17\u0e35\u0e48\u0e44\u0e14\u0e49\u0e23\u0e39\u0e49\u0e08\u0e31\u0e01 {$name}! / Nice to meet you, {$name}!");
            $this->stopsConversation();
        });
    }

    public function run()
    {
        $this->askName();
    }
}

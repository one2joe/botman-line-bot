<?php

namespace BotMan\LineBot\Tests\Unit\Conversations;

use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\LineBot\Conversations\NameConversation;
use PHPUnit\Framework\TestCase;

class NameConversationTest extends TestCase
{
    public function test_conversation_runs()
    {
        $conversation = new NameConversation();
        $this->assertTrue(method_exists($conversation, 'run'));
        $this->assertTrue(method_exists($conversation, 'askName'));
    }
}

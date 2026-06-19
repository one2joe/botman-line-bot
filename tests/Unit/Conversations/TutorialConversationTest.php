<?php

namespace BotMan\LineBot\Tests\Unit\Conversations;

use BotMan\LineBot\Conversations\TutorialConversation;
use PHPUnit\Framework\TestCase;

class TutorialConversationTest extends TestCase
{
    public function test_conversation_has_all_steps()
    {
        $conversation = new TutorialConversation();
        $this->assertTrue(method_exists($conversation, 'run'));
        $this->assertTrue(method_exists($conversation, 'step1'));
        $this->assertTrue(method_exists($conversation, 'step2'));
        $this->assertTrue(method_exists($conversation, 'step3'));
        $this->assertTrue(method_exists($conversation, 'step4'));
        $this->assertTrue(method_exists($conversation, 'step5'));
    }
}

<?php

use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Attachments\Audio;
use BotMan\BotMan\Messages\Attachments\Video;
use BotMan\BotMan\Messages\Attachments\Location;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\Drivers\Line\Extensions\Templates\Buttons as LineButtons;
use BotMan\Drivers\Line\Extensions\Templates\Carousel;
use BotMan\Drivers\Line\Extensions\Templates\CarouselColumn;
use BotMan\Drivers\Line\Extensions\Templates\Confirm;
use BotMan\Drivers\Line\Extensions\Templates\Actions\TemplateAction;
use BotMan\LineBot\Conversations\NameConversation;
use BotMan\LineBot\Conversations\TutorialConversation;
use BotMan\LineBot\Showcase\FlexMessageHelper;
use BotMan\LineBot\Showcase\TemplateHelper;

$botman->hears('\u0e2a\u0e27\u0e31\u0e2a\u0e14\u0e35|hi|hello', function (BotMan $bot) {
    $bot->reply('\u0e2a\u0e27\u0e31\u0e2a\u0e14\u0e35\u0e04\u0e23\u0e31\u0e1a! \u0e22\u0e34\u0e19\u0e14\u0e35\u0e15\u0e49\u0e2d\u0e19\u0e23\u0e31\u0e1a\u0e2a\u0e39\u0e48 LINE BotMan');

    $question = Question::create('\u0e1e\u0e34\u0e21\u0e1e\u0e4c /\u0e0a\u0e48\u0e27\u0e22\u0e40\u0e2b\u0e25\u0e37\u0e2d \u0e40\u0e1e\u0e37\u0e48\u0e2d\u0e14\u0e39\u0e04\u0e33\u0e2a\u0e31\u0e48\u0e07\u0e17\u0e31\u0e49\u0e07\u0e2b\u0e21\u0e14')
        ->addButton(Button::create('/\u0e0a\u0e48\u0e27\u0e22\u0e40\u0e2b\u0e25\u0e37\u0e2d')->value('/help'))
        ->addButton(Button::create('/\u0e40\u0e21\u0e19\u0e39')->value('/menu'));

    $bot->reply($question);
});

$botman->hears('/\u0e0a\u0e48\u0e27\u0e22\u0e40\u0e2b\u0e25\u0e37\u0e2d|/help', function (BotMan $bot) {
    $template = LineButtons::create('\u0e04\u0e33\u0e2a\u0e31\u0e48\u0e07\u0e17\u0e35\u0e48\u0e21\u0e35\u0e43\u0e2b\u0e49\u0e43\u0e0a\u0e49\u0e07\u0e32\u0e19')
        ->title('LINE BotMan Help')
        ->addAction(TemplateAction::create()->message('/\u0e41\u0e19\u0e30\u0e19\u0e33', '/\u0e41\u0e19\u0e30\u0e19\u0e33'))
        ->addAction(TemplateAction::create()->message('/\u0e0a\u0e37\u0e48\u0e2d', '/\u0e0a\u0e37\u0e48\u0e2d'))
        ->addAction(TemplateAction::create()->message('/\u0e40\u0e17\u0e21\u0e40\u0e1e\u0e25\u0e15', '/\u0e40\u0e17\u0e21\u0e40\u0e1e\u0e25\u0e15'))
        ->addAction(TemplateAction::create()->message('/\u0e40\u0e1f\u0e25\u0e47\u0e01\u0e0b\u0e4c', '/\u0e40\u0e1f\u0e25\u0e47\u0e01\u0e0b\u0e4c'));

    $bot->reply($template);
});

$botman->hears('/\u0e40\u0e21\u0e19\u0e39|/menu', function (BotMan $bot) {
    $carousel = Carousel::create('LINE BotMan Menu')
        ->addColumn(
            CarouselColumn::create('\u0e41\u0e19\u0e30\u0e19\u0e33\u0e01\u0e32\u0e23\u0e43\u0e0a\u0e49\u0e07\u0e32\u0e19')
                ->title('Tutorial')
                ->addAction(TemplateAction::create()->message('\u0e40\u0e23\u0e34\u0e48\u0e21\u0e40\u0e23\u0e35\u0e22\u0e19\u0e23\u0e39\u0e49', '/\u0e41\u0e19\u0e30\u0e19\u0e33'))
        )
        ->addColumn(
            CarouselColumn::create('\u0e15\u0e31\u0e49\u0e07\u0e0a\u0e37\u0e48\u0e2d\u0e02\u0e2d\u0e07\u0e04\u0e38\u0e13')
                ->title('Name')
                ->addAction(TemplateAction::create()->message('\u0e15\u0e31\u0e49\u0e07\u0e0a\u0e37\u0e48\u0e2d', '/\u0e0a\u0e37\u0e48\u0e2d'))
        )
        ->addColumn(
            CarouselColumn::create('\u0e40\u0e17\u0e21\u0e40\u0e1e\u0e25\u0e15\u0e17\u0e31\u0e49\u0e07\u0e2b\u0e21\u0e14')
                ->title('Templates')
                ->addAction(TemplateAction::create()->message('\u0e14\u0e39\u0e40\u0e17\u0e21\u0e40\u0e1e\u0e25\u0e15', '/\u0e40\u0e17\u0e21\u0e40\u0e1e\u0e25\u0e15'))
        )
        ->addColumn(
            CarouselColumn::create('Flex Message')
                ->title('Flex')
                ->addAction(TemplateAction::create()->message('\u0e14\u0e39 Flex', '/\u0e40\u0e1f\u0e25\u0e47\u0e01\u0e0b\u0e4c'))
        );

    $bot->reply($carousel);
});

$botman->hears('/\u0e41\u0e19\u0e30\u0e19\u0e33|/tutorial', function (BotMan $bot) {
    $bot->startConversation(new TutorialConversation());
});

$botman->hears('/\u0e0a\u0e37\u0e48\u0e2d|/name', function (BotMan $bot) {
    $bot->startConversation(new NameConversation());
});

$botman->hears('/\u0e40\u0e17\u0e21\u0e40\u0e1e\u0e25\u0e15|/template', function (BotMan $bot) {
    $template = Confirm::create('\u0e15\u0e49\u0e2d\u0e07\u0e01\u0e32\u0e23\u0e14\u0e39\u0e40\u0e17\u0e21\u0e40\u0e1e\u0e25\u0e15\u0e41\u0e1a\u0e1a\u0e44\u0e2b\u0e19?')
        ->addAction(TemplateAction::create()->message('Buttons', 'buttons'))
        ->addAction(TemplateAction::create()->message('Carousel', 'carousel'));

    $bot->reply($template);
});

$botman->hears('buttons', function (BotMan $bot) {
    $bot->reply(TemplateHelper::buttons());
});

$botman->hears('carousel', function (BotMan $bot) {
    $bot->reply(TemplateHelper::carousel());
});

$botman->hears('/\u0e40\u0e1f\u0e25\u0e47\u0e01\u0e0b\u0e4c|/flex', function (BotMan $bot) {
    $bot->reply(FlexMessageHelper::sampleBubble());
});

$botman->hears(Image::PATTERN, function (BotMan $bot) {
    $bot->reply('I see you sent an image! (Demonstration)');
});

$botman->hears(Audio::PATTERN, function (BotMan $bot) {
    $bot->reply('Audio received!');
});

$botman->hears(Video::PATTERN, function (BotMan $bot) {
    $bot->reply('Video received!');
});

$botman->hears(Location::PATTERN, function (BotMan $bot) {
    $bot->reply('Location received!');
});

$botman->hears('__sticker__', function (BotMan $bot) {
    $bot->reply('Nice sticker!');
});

$botman->hears('__file__', function (BotMan $bot) {
    $bot->reply('File received!');
});

$botman->on('follow', function ($payload, BotMan $bot) {
    $bot->reply('\u0e02\u0e2d\u0e1a\u0e04\u0e38\u0e13\u0e17\u0e35\u0e48\u0e15\u0e34\u0e14\u0e15\u0e32\u0e21! \u0e21\u0e32\u0e40\u0e23\u0e34\u0e48\u0e21\u0e40\u0e23\u0e35\u0e22\u0e19\u0e01\u0e31\u0e19\u0e40\u0e25\u0e22');
    $bot->startConversation(new TutorialConversation());
});

$botman->fallback(function (BotMan $bot) {
    $bot->reply('\u0e44\u0e21\u0e48\u0e40\u0e02\u0e49\u0e32\u0e43\u0e08\u0e04\u0e33\u0e16\u0e32\u0e21 \u0e1e\u0e34\u0e21\u0e1e\u0e4c /\u0e0a\u0e48\u0e27\u0e22\u0e40\u0e2b\u0e25\u0e37\u0e2d \u0e40\u0e1e\u0e37\u0e48\u0e2d\u0e14\u0e39\u0e04\u0e33\u0e2a\u0e31\u0e48\u0e07');
});

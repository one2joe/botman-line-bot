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

$botman->hears('สวัสดี|hi|hello', function (BotMan $bot) {
    $bot->reply('สวัสดีครับ! ยินดีต้อนรับสู่ LINE BotMan');

    $question = Question::create('พิมพ์ /ช่วยเหลือ เพื่อดูคำสั่งทั้งหมด')
        ->addButton(Button::create('/ช่วยเหลือ')->value('/help'))
        ->addButton(Button::create('/เมนู')->value('/menu'));

    $bot->reply($question);
});

$botman->hears('/ช่วยเหลือ|/help', function (BotMan $bot) {
    $template = LineButtons::create('คำสั่งที่มีให้ใช้งาน')
        ->title('LINE BotMan Help')
        ->addAction(TemplateAction::create()->message('/แนะนำ', '/แนะนำ'))
        ->addAction(TemplateAction::create()->message('/ชื่อ', '/ชื่อ'))
        ->addAction(TemplateAction::create()->message('/เทมเพลต', '/เทมเพลต'))
        ->addAction(TemplateAction::create()->message('/เฟล็กซ์', '/เฟล็กซ์'));

    $bot->reply($template);
});

$botman->hears('/เมนู|/menu', function (BotMan $bot) {
    $carousel = Carousel::create('LINE BotMan Menu')
        ->addColumn(
            CarouselColumn::create('แนะนำการใช้งาน')
                ->title('Tutorial')
                ->addAction(TemplateAction::create()->message('เริ่มเรียนรู้', '/แนะนำ'))
        )
        ->addColumn(
            CarouselColumn::create('ตั้งชื่อของคุณ')
                ->title('Name')
                ->addAction(TemplateAction::create()->message('ตั้งชื่อ', '/ชื่อ'))
        )
        ->addColumn(
            CarouselColumn::create('เทมเพลตทั้งหมด')
                ->title('Templates')
                ->addAction(TemplateAction::create()->message('ดูเทมเพลต', '/เทมเพลต'))
        )
        ->addColumn(
            CarouselColumn::create('Flex Message')
                ->title('Flex')
                ->addAction(TemplateAction::create()->message('ดู Flex', '/เฟล็กซ์'))
        );

    $bot->reply($carousel);
});

$botman->hears('/แนะนำ|/tutorial', function (BotMan $bot) {
    $bot->startConversation(new TutorialConversation());
});

$botman->hears('/ชื่อ|/name', function (BotMan $bot) {
    $bot->startConversation(new NameConversation());
});

$botman->hears('/เทมเพลต|/template', function (BotMan $bot) {
    $template = Confirm::create('ต้องการดูเทมเพลตแบบไหน?')
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

$botman->hears('/เฟล็กซ์|/flex', function (BotMan $bot) {
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
    $bot->reply('ขอบคุณที่ติดตาม! มาเริ่มเรียนกันเลย');
    $bot->startConversation(new TutorialConversation());
});

$botman->fallback(function (BotMan $bot) {
    $bot->reply('ไม่เข้าใจคำถาม พิมพ์ /ช่วยเหลือ เพื่อดูคำสั่ง');
});

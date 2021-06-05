<?php


use LinJoe\Ding\Messages\Link;

require './vendor/autoload.php';


$ding = new \LinJoe\Ding\DingTalk([
    'appKey' => 'dingvgyrqnjugowjkpks',
    'appSecret' => 'llMdYtRKlX7HI6ZhBms9yD3N4oZmegToWsJd8hFKE5O4GcEgPNg-9xZ_ScBiy1RV',
//    'appKey' => 'dingpwuec7186npxvu9l',
//    'appSecret' => 'nmFgqE9_jqOEqZYsCtej_UNO731feL04028jgVSmlcuqFNG6iTixZlX1IyY_3F8T',
    'link' => '/robot/send',
    'access_token' => '11e45d17952d1bd5db597889892eecaecb3ba7b782d34509d38ed43b39932f0d'
]);

// 测试文本
$text_message = new \LinJoe\Ding\Messages\Text('测试文本');
$ding->send($text_message->toArray());

// 测试link
$link_message = (new \LinJoe\Ding\Messages\Link('https://zheisin.cn/about/copyright'))
    ->setPictureUrl('http://cdn.zheisin.cn/uploads/20210602/FkAlPoNLGLBxru9xqHzRIYmm7Wyt.jpg')
    ->setTitle('测试link_title')
    ->setText('测试link_text');
$ding->send($link_message->toArray());


// 测试link
$link_message = (new \LinJoe\Ding\Messages\Markdown('https://zheisin.cn/about/copyright'))
    ->setTitle('测试link')
    ->setText('测试link');
$ding->send($link_message->toArray());

die;

//$res = $ding->send($message);

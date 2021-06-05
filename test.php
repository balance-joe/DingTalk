<?php


use LinJoe\Ding\Messages\Link;

require './vendor/autoload.php';


$ding = new \LinJoe\Ding\DingTalk([
    'appKey' => 'dingvgyrqnjugowjkpks',
    'appSecret' => 'llMdYtRKlX7HI6ZhBms9yD3N4oZmegToWsJd8hFKE5O4GcEgPNg-9xZ_ScBiy1RV',
    'link' => '/topapi/message/corpconversation/asyncsend_v2'

//    'link' => '/robot/send',
//    'access_token' => '11e45d17952d1bd5db597889892eecaecb3ba7b782d34509d38ed43b39932f0d'
]);

// 测试文本
$text_message = new \LinJoe\Ding\Messages\Text('测试文本');
$text_message_res =  $ding->send($text_message->toArray());
var_dump($text_message_res);
die();
// 测试link
$link_message = (new \LinJoe\Ding\Messages\Link('https://zheisin.cn/about/copyright'))
    ->setPictureUrl('http://cdn.zheisin.cn/uploads/20210602/FkAlPoNLGLBxru9xqHzRIYmm7Wyt.jpg')
    ->setTitle('测试link_title')
    ->setText('测试link_text');
//$ding->send($link_message->toArray());

// 测试markdown
$markdown_message = (new \LinJoe\Ding\Messages\Markdown('# 这是支持markdown的文本 \\n## 标题2  \\n* 列表1 \\n![alt 啊](https://img.alicdn.com/tps/TB1XLjqNVXXXXc4XVXXXXXXXXXX-170-64.png)"'))
    ->setTitle('杭州');
//$ding->send($markdown_message->toArray());

// 测试markdown
$actionCard_message = (new \LinJoe\Ding\Messages\ActionCard("![screenshot](https://gw.alicdn.com/tfs/TB1ut3xxbsrBKNjSZFpXXcXhFXa-846-786.png) 
 ### 乔布斯 20 年前想打造的苹果咖啡厅 
 Apple Store 的设计正从原来满满的科技感走向生活化，而其生活化的走向其实可以追溯到 20 年前苹果一个建立咖啡馆的计划"))
//    ->setBtnOrientation('0')
    ->setSingleTitle('阅读全文')
    ->setSingleURL('https://www.dingtalk.com/')
    ->setTitle('乔布斯 20 年前想打造一间苹果咖啡厅，而它正是 Apple Store 的前身');
$res = $ding->send($actionCard_message->toArray());
var_dump($res);


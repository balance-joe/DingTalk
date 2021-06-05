<?php

namespace DingTest;


use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Response;
use LinJoe\Ding\DingTalk;
use LinJoe\Ding\Talk;
use PHPUnit\Framework\TestCase;

class DingTest extends TestCase
{
    protected $successResult = ['errmsg' => 'ok', 'errcode' => 0];
    /**
     * @var Talk
     */
    private $ding_talk;


    protected function setUp()
    {

        $this->ding_talk = new DingTalk([
            'appKey' => 'dingvgyrqnjugowjkpks',
            'appSecret' => 'llMdYtRKlX7HI6ZhBms9yD3N4oZmegToWsJd8hFKE5O4GcEgPNg',
        ]);
//        $this->ding_talk = new DingTalk();
    }

    public function testTextMessage()
    {
        $message = new \LinJoe\Ding\Messages_back\Text('@张三 测试消息');
        $result = $this->ding_talk->sendWorkNotice('024246103336342620', $message, 1202478190);
        $this->assertEquals($this->successResult, $result);
    }


}
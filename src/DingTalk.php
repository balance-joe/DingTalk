<?php


namespace LinJoe\Ding;

use GuzzleHttp\Client;
use Jaeger\GHttp;

class DingTalk
{

    protected $config;

    protected $base_uri = 'https://oapi.dingtalk.com';

    protected $urls = [
        'gettoken' => '/gettoken',
        'message' => [
            'update' => '/topapi/message/corpconversation/status_bar/update', //更新工作通知状态栏
            'recall' => '/topapi//message/corpconversation/recall', //更新工作通知状态栏
            'asyncsend_v2' => '/topapi/message/corpconversation/asyncsend_v2', //异步发送工作通知消息接口
            'getsendresult' => '/topapi/message/corpconversation/getsendresult', //获取工作通知消息的发送结果
        ],
        'robot' => '/robot/send'
    ];

    protected $access_token;

    /**
     * 整体
     * @var string
     */
    private $request_url;

    public function __construct($config)
    {
        $this->config = $config;
        $this->access_token = $this->config['access_token'] ?: $this->accessToken();
        $this->request_url = $this->base_uri . $this->config['link'] . '?access_token=' . $this->access_token;
    }

    /*
     * 获取access_token
     * */
    private function accessToken()
    {
        return GHttp::getJson($this->base_uri . $this->urls['gettoken'],
            ['appkey' => $this->config['appKey'], 'appsecret' => $this->config['appSecret']])
            ['access_token'];

    }

    public function send($message)
    {
        $client = new Client();
        return $client->request('POST', $this->request_url, [
            'json' => $message,
        ]);

    }

}
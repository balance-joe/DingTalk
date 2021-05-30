<?php

namespace LinJoe\Ding;

use LinJoe\Ding\Exceptions\Request;
use LinJoe\Ding\Messages\Message;
use GuzzleHttp\Client;

class DingTalk
{

    protected $config;
    protected $http;


    public function __construct($config)
    {
        $this->config = $config;
        $this->http = new Client([
            'base_uri' => 'https://oapi.dingtalk.com',
        ]);
    }

    public function accessToken()
    {
        return $this->request('GET', '/gettoken', [
            'query' => [
                'appkey' => $this->config['appKey'],
                'appsecret' => $this->config['appSecret'],
            ],
        ])->access_token;
    }

    /**
     * 发送工作通知
     * @param $userid_list
     * @param $message
     * @param $agent_id
     * @return $this
     */
    public function sendWorkNotice($userid_list, Message $message, $agent_id = 0)
    {
        $this->request('POST', '/topapi/message/corpconversation/asyncsend_v2', [
            'query' => [
                'access_token' => $this->accessToken(),
            ],
            'form_params' => [
                'agent_id' => $agent_id,
                'userid_list' => $userid_list,
                'msg' => json_encode($message->getBody())
            ],
        ]);

        return $this;
    }

    public function sendBot($access_token, Message $message)
    {
        $this->request('POST', '/robot/send', [
            'query' => [
                'access_token' => $access_token,
            ],
            'json' => $message->getBody(),
        ]);

        return $this;
    }

    protected function request($method, $url, $params = [])
    {
        $body = $this->http->request($method, $url, $params)->getBody();
        $ret = json_decode($body);
        if ($ret->errcode) {
            throw new Request($ret->errmsg ?: 'request dingtalk api faild.');
        }


        return $ret;
    }
}
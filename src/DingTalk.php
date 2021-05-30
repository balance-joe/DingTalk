<?php


namespace LinJoe\Ding;


use GuzzleHttp\Client;

class DingTalk
{

    private $config;
    /**
     * @var Client
     */
    private $http;

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

    public function send()
    {
        var_dump('-------------');
    }



    protected function request($method, $url, $params = [])
    {
        $body = $this->http->request($method, $url, $params)->getBody();
        $ret = json_decode($body);
        if($ret->errcode)
        {
            throw new Request($ret->errmsg ?: 'request dingtalk api faild.');
        }


        return $ret;
    }




}
<?php

namespace LinJoe\Ding\Messages;

class FeedCard extends Message
{
    protected $service;

    public function __construct()
    {
        $this->message = [
            'feedCard' => [
                'links' => []
            ],
            'msgtype' => 'feedCard'
        ];
    }

    public function addLinks($title,$messageUrl,$picUrl){
        $this->message['feedCard']['links'][] = [
            'title' => $title,
            'messageURL' => $messageUrl,
            'picURL' => $picUrl
        ];
        return $this;
    }
}
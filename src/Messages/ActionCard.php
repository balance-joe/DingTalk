<?php

namespace LinJoe\Ding\Messages;

class ActionCard extends Message
{
    public function __construct($title, $markdown){
        $this->message = [
            'msgtype' => 'actionCard',
            'actionCard' => [
                'title' => $title,
                'text' => $markdown,
                'btnOrientation' => 0
            ]
        ];
    }

    public function btnOrientation($ori = 1)
    {
        $this->message['actionCard']['btnOrientation'] = $ori;
    }

    public function single($title,$url){
        $this->message['actionCard']['singleTitle'] = $title;
        $this->message['actionCard']['singleURL'] = $url;
        return $this;
    }

    public function addButton($title, $url){
        $this->message['actionCard']['btns'][] = [
            'title' => $title,
            'actionURL' => $url
        ];
        return $this;
    }
}
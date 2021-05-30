<?php

namespace LinJoe\Ding\Messages;

class Markdown extends Message
{
    public function __construct($title,$markdown)
    {
        $this->message  = [
            'msgtype' => 'markdown',
            'markdown' => [
                'title' => $title,
                'text' => $markdown
            ]
        ];
    }

}
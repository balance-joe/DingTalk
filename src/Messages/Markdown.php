<?php


namespace LinJoe\Ding\Messages;


class Markdown extends Message
{
    protected $type = 'markdown';

    public function setTitle($value)
    {
        return $this->setAttribute('title', $value);
    }

    protected function transform($value)
    {
        list($text) = $value;
        return ['text' => $text];
    }

}
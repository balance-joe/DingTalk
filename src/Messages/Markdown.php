<?php


namespace LinJoe\Ding\Messages;


class Markdown extends Message
{
    protected $type = 'markdown';

    public function setTitle($value)
    {
        return $this->setAttribute('title', $value);
    }

    public function setText($value)
    {
        return $this->setAttribute('text', $value);
    }

    protected function transform($value)
    {
        list($content) = $value;
        return ['content' => $content];
    }

}
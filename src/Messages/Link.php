<?php


namespace LinJoe\Ding\Messages;

class Link extends Message
{
    protected $type = 'link';

    public function setPictureUrl($value)
    {
        return $this->setAttribute('picUrl', $value);
    }

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
        list($url) = $value;

        return ['messageUrl' => $url];
    }
}

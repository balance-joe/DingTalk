<?php


namespace LinJoe\Ding\Messages;

class Text extends Message
{
    protected $type = 'text';

    protected function transform($value)
    {
        list($content) = $value;
        return ['content' => $content];
    }
}

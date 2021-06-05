<?php


namespace LinJoe\Ding\Messages;

class Image extends Message
{
    protected $type = 'image';

    protected function transform($value)
    {
        list($mediaId) = $value;

        return ['media_id' => $mediaId];
    }
}

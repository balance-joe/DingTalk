<?php


namespace LinJoe\Ding\Messages;

class File extends Message
{
    protected $type = 'file';

    protected function transform($value)
    {
        list($mediaId) = $value;

        return ['media_id' => $mediaId];
    }
}

<?php


namespace LinJoe\Ding\Messages;

class Voice extends Message
{
    protected $type = 'voice';

    protected function transform($value)
    {
        list($mediaId, $duration) = $value;

        return ['media_id' => $mediaId, 'duration' => $duration];
    }
}

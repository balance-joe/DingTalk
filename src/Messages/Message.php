<?php


namespace LinJoe\Ding\Messages;

class Message
{
    protected $value;
    protected $type;
    protected $attributes = [];

    public function __construct(...$value)
    {
        $this->value = $value;
    }

    public static function make()
    {
        return new static(...func_get_args());
    }

    public function type()
    {
        return $this->type;
    }

    protected function transform($value)
    {
        return $value;
    }

    public function setAttribute($key, $value)
    {
        $this->attributes[$key] = $value;

        return $this;
    }

    public function toArray()
    {
        return [
            'msgtype' => $this->type(),
            $this->type() => array_merge($this->transform($this->value), $this->attributes),
        ];
    }

    public function toJson()
    {
        return json_encode($this->toArray());
    }
}

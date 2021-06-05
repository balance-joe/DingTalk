<?php


namespace LinJoe\Ding\Messages;


class ActionCard extends Message
{
    protected $type = 'actionCard';

    /**
     * @param $value String 必填 首屏会话透出的展示内容。
     * @return ActionCard
     * */
    public function setTitle($value)
    {
        return $this->setAttribute('title', $value);
    }

    /**
     * @param $value String 必填 单个按钮的标题。
     * @return ActionCard
     * */
    public function setSingleTitle($value)
    {
        return $this->setAttribute('title', $value);
    }

    /**
     * @param $value String 必填 点击singleTitle按钮触发的URL。
     * @return ActionCard
     * */
    public function setSingleURL($value)
    {
        return $this->setAttribute('title', $value);
    }

    /**
     * @param $value String 非必填 0：按钮竖直排列 1：按钮横向排列
     * @return ActionCard
     */
    public function setBtnOrientation($value)
    {
        return $this->setAttribute('title', $value);
    }

    /**
     * @param $value string markdown格式的消息。
     *
     * @return string[]
     */
    protected function transform($value)
    {
        list($text) = $value;
        return ['text' => $text];
    }


}
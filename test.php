<?php


require './vendor/autoload.php';



//require_once 'src/DingTalk.php';


$ding = new \LinJoe\Ding\DingTalk([
    'appKey'=>1234564,
    'appSecret'=>1234564,

]);

var_dump($ding->send());

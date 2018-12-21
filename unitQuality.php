<?php
/**
 * Created by PhpStorm.
 * User: yangzhenyu
 * Date: 2018/12/10
 * Time: 上午9:23
 */

require_once 'vendor/autoload.php';
\EasySwoole\EasySwoole\Core::getInstance()->initialize();
$q = new \App\Bean\People\Quality();
$q->setQualityName('灵活');
//[{"let"=>HIT_ADD,"effect"=>10}]#效果为百分比
$q->setEffect(
[
    [
        'let'=>$q::ARMOR_ADD,
        'effect'=>-5
    ],
    [
        'let'=>$q::DODGE_ADD,
        'effect'=>15
    ]
]
);

$tools = new App\Tools\DataTools();
$tools->setSYs('Quality/灵活',$q);
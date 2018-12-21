<?php
/**
 * Created by PhpStorm.
 * User: yangzhenyu
 * Date: 2018/12/10
 * Time: 上午9:23
 */

require_once 'vendor/autoload.php';
\EasySwoole\EasySwoole\Core::getInstance()->initialize();

$r = new \App\Bean\Region\Region();
$r->setName('于州');
$r->setSeason($r::SUMMER);
$r->setPlace(['canghai']);
$tools = new App\Tools\DataTools();
$tools->setSYs('Region/于州',$r);

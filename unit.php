<?php
/**
 * Created by PhpStorm.
 * User: yangzhenyu
 * Date: 2018/12/10
 * Time: 上午9:23
 */

require_once 'vendor/autoload.php';
\EasySwoole\EasySwoole\Core::getInstance()->initialize();
$server = new \App\Socket\Server();


die();
$userId = '126';
$tools = new \App\Tools\DataTools();
$userInfo = $tools->getPlayerData($userId);
$mInfo = $tools->getMonsterData('乞丐');



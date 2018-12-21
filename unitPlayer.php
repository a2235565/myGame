<?php
/**
 * Created by PhpStorm.
 * User: yangzhenyu
 * Date: 2018/12/10
 * Time: 上午9:23
 */

require_once 'vendor/autoload.php';
\EasySwoole\EasySwoole\Core::getInstance()->initialize();
$fd= 126;
$g=new \App\Tools\Generator();
//$p = $g->player();
//
$tools = new App\Tools\DataTools();
//$tools->setPlayerData($fd,$p);
$player = $tools->getPlayerData($fd);
$player2 = $tools->getMonsterData('乞丐');
//$player2 = $tools->getMonsterData('武者');

//选择出生地
//$b = '沧海';
//$player = $g->playerSelectBirthplace($b,$player);
//if($player){
//    $tools->setPlayerData($fd,$player);
//}

$c = new \App\Tools\Core();
//$return = $c->PlayStart($player,$player2);
//if($return['res']='user1'){
//  echo $return['user1']->getName();
//}
//
//die();
$win=0;
for ($i=0;$i<100;$i++){
    $return = $c->PlayStart($player,$player2);
    if($return['res']=='user1'){
        $win++;
    }
}
echo $win;
function returnPlayer($p):\App\Bean\People\Player{
    return $p;
}
function returnM($m):\App\Bean\People\Monster{
    return $m;
}

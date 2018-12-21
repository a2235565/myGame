<?php
/**
 * Created by PhpStorm.
 * User: yangzhenyu
 * Date: 2018/12/10
 * Time: 上午9:23
 */

require_once 'vendor/autoload.php';
\EasySwoole\EasySwoole\Core::getInstance()->initialize();

$id = '乞丐';
$bean = new \App\Bean\People\Monster();
$bean->setName('乞丐');
$bean->setHit('100'); //命中
$bean->setArmor('33');  //护甲
$bean->setDps('33'); //伤害
$bean->setLifeValue('55'); //生命
$bean->setInjury('5'); //伤势
$bean->setLevel(1); //登记
$bean->setSkill([ "左钩拳"]);
$bean->setLocation('沧海'); //所在地
$bean->setDodge(60); //躲避
$bean->setMood(5); //心情
$bean->setDrop('金钱，经验，疯狗拳');
$bean->setBank(100);
$bean->setM(33);
$bean->setT(33);
$bean->setZ(33);
$bean->setL(33);
$rule = new \App\Bean\People\DropRule();
$rule->setLuckRule(0.3);
$rule->setRule(
    [
        [
            'odds'=>'100',
            'thing'=>['exp'=>10]
        ],
        [
            'odds'=>'50',
            'thing'=>['money'=>5]
        ],
        [
            'odds'=>'10',
            'thing'=>['skill'=>'疯狗拳']
        ]
    ]
);
$bean->setDropRule(
    $rule
);


$tools = new \App\Tools\DataTools();
$tools->setMonsterData($id,$bean);
echo PHP_EOL;
var_dump($tools->getMonsterData($id));


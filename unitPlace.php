<?php
/**
 * Created by PhpStorm.
 * User: yangzhenyu
 * Date: 2018/12/10
 * Time: 上午9:23
 */

require_once 'vendor/autoload.php';
\EasySwoole\EasySwoole\Core::getInstance()->initialize();

$p = new \App\Bean\Region\Place();
$p->setName('沧海');
$p->setAdventureList(['恶乞丐偷钱','枪版如来神掌','盗版易筋经']);
//[{"odds":10,"let"=>MONEY_CHANGE,"do"=>"-1000"}]
$p->setAdventureRule([
    [
        "odds"=>1,
        "let"=>$p::THING_CHANGE,
        "do"=>"盗版易筋经"
    ],
    [
        "odds"=>3,
        "let"=>$p::THING_CHANGE,
        "do"=>"枪版如来神掌"
    ],
    [
        "odds"=>25,
        "let"=>$p::MONEY_CHANGE,
        "do"=>"-1000"
    ]
]);
$p->setFight($p::FIGHT_FALSE);
$p->setFightRule([]);
$p->setMonsterList(['乞丐','混混','市井无赖']);
//[{"odds":1,"touch"=>'乞丐'}]
$p->setMonsterRule([
    [
        'odds'=>30,
        'touch'=>'乞丐'
    ], [
        'odds'=>30,
        'touch'=>'混混'
    ], [
        'odds'=>30,
        'touch'=>'市井无赖'
    ],
]);
$tools = new App\Tools\DataTools();
$tools->setSYs('Place/沧海',$p);

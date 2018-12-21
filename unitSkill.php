<?php
/**
 * Created by PhpStorm.
 * User: yangzhenyu
 * Date: 2018/12/10
 * Time: 上午9:23
 */

require_once 'vendor/autoload.php';
\EasySwoole\EasySwoole\Core::getInstance()->initialize();

$skillName = '妙手空空';
$tools = new \App\Tools\DataTools();
$low = new \App\Bean\Skill\Lower();
$low->setName($skillName);
$e = new \App\Bean\Skill\SkillEffect();

$e->setDps([[
    'odds'=>100,
    'let'=>$e::FOR_SELF,
    'do'=>1
]]);
$e->setHit([[
    'odds'=>100,
    'let'=>$e::FOR_SELF,
    'do'=>1
]]);
$e->setBank([[
    'odds'=>100,
    'let'=>$e::FOR_OTHER,
    'do'=>0.3
]]);
$e->setDodge([[
    'odds'=>100,
    'let'=>$e::FOR_SELF,
    'do'=>1
]]);
$e->setArmor([[
    'odds'=>100,
    'let'=>$e::FOR_SELF,
    'do'=>1
]]);
$e->setFirst([[
    'odds'=>100,
    'let'=>$e::FOR_SELF,
    'do'=>1
]]);
$e->setLifeValue([[
    'odds'=>100,
    'let'=>$e::FOR_SELF,
    'do'=>0
]]);
$low->setEffect($e);
$s = new \App\Bean\Skill\Satisfy();
$s->setL(1);
$s->setM(1);
$s->setNeedSkill([]);
$s->setT(1);
$low->setSatisfy($s);
$low->setTrigger(100);
$tools->setSkill($skillName,1,$low);
$skill = $tools->getSkill($skillName);



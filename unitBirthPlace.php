<?php
/**
 * Created by PhpStorm.
 * User: yangzhenyu
 * Date: 2018/12/10
 * Time: 上午9:23
 */

require_once 'vendor/autoload.php';
\EasySwoole\EasySwoole\Core::getInstance()->initialize();

$bp = new \App\Bean\People\Birthplace();
$bp->setName('沧海');
$bpE = new \App\Bean\People\BirthplaceEffect();
// {"t":1,"m":-1,"z":-1,"l":1,"lifeValue":20}
$bpE->setBasic(
    [
        't'=>-15,
        'm'=>15,
        'l'=>-5,
        'z'=>5,
        'lifeValue'=>-20
    ]
);
// [{"odds":10,"skill":'huixue'}]
$bpE->setSkill([
    [
        'odds'=>30,
        'skill'=>'妙手空空'
    ]
]);
$bp->setEffect($bpE);
$tools = new App\Tools\DataTools();
$tools->setSYs('Birthplace/沧海',$bp);


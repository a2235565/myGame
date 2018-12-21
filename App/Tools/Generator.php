<?php
namespace App\Tools;
use App\Bean\People\Birthplace;
use App\Bean\People\BirthplaceEffect;
use App\Bean\People\Player;
use App\Bean\Skill\BuffEffect;
use PhpParser\Node\Expr\Cast\Bool_;

/**
 * 人物生成器
 * Class PlayerGenerator
 */
class Generator
{

    /**
     * 出生地选择
     * playerSelectBirthplace
     * @param        $BirthplaceName
     * @param Player $player
     * @return Player|null
     * @author yangzhenyu
     * Time: 下午3:26
     */
    function playerSelectBirthplace($BirthplaceName,Player $player):?Player{
        $skill = $player->getSkill();
        $player->setSkill($skill['code']);
        $tools = new DataTools();
        $b = $tools->getSys('Birthplace/'.$BirthplaceName);
        if($b==null){
            return null;
        }
        if($player->getBirthplace()!='不知名'){
            return null;
        }
        $b['effect'] = new BirthplaceEffect($b['effect']);

        $player->setBirthplace($BirthplaceName);
        $b = new Birthplace($b);
        $eff = $b->getEffect();
        $skill = $eff->getSkill();
        // {"t":1,"m":-1,"z":-1,"l":1,"lifeValue":20}
        $basic = $eff->getBasic();
        if(!empty($basic['l'])){
            $player->setL($player->getL()+$basic['l']);
        }
        if(!empty($basic['m'])){
            $player->setM($player->getM()+$basic['m']);
        }
        if(!empty($basic['t'])){
            $player->setT($player->getT()+$basic['t']);
        }
        if(!empty($basic['z'])){
            $player->setZ($player->getZ()+$basic['z']);
        }
        if(!empty($basic['lifeValue'])){
            $player->setLifeValue($player->getLifeValue()+$basic['lifeValue']);
        }
        $getSkill = [];
        foreach ($skill as $v){
            if(rand(0,100)<$v['odds']){
                $getSkill[] = $v['skill'];
            }
        }

        $player->setSkill(array_merge($player->getSkill(),$getSkill));
        return $player;
    }
    function player(){
        $bean = new Player();
        $playerInfoStr = '';
        $bean->setLevel(1);
        $bean->setInjury(0);
        $bean->setExperience(0);
        $bean->setFirst(0);
        $level = rand(1,3);
        $bean->setL(30);
        $bean->setM(30);
        $bean->setT(30);
        $bean->setZ(30);
        switch ($level){
            case 1:
                $playerInfoStr='体弱多病-久病成医';
                $bean->setLifeValue(rand(30,60));
                $bean->setDps(rand(30,60));
                $bean->setHit(rand(30,60));
                $bean->setDodge(rand(30,60));
                $bean->setArmor(rand(30,60));
                $bean->setMood(8);
                $bean->setSkill(array_merge($bean->getSkill(),['治疗']));
                break;
            case 2:
                $bean->setLifeValue(rand(60,80));
                $bean->setDps(rand(80,100));
                $bean->setHit(rand(80,100));
                $bean->setDodge(rand(80,100));
                $bean->setArmor(rand(60,80));
                $playerInfoStr='自小练武-稍有损伤';
                $bean->setMood(9);
                break;
            case 3:
                $bean->setLifeValue(rand(80,100));
                $bean->setDps(rand(30,80));
                $bean->setHit(rand(30,80));
                $bean->setDodge(rand(30,80));
                $bean->setArmor(rand(60,100));
                $playerInfoStr='普通村民-精力充沛';
                $bean->setMood(10);
                break;
        }
        $levelLuck = rand(0,100);
       if($levelLuck<80){
           $playerInfoStr.='-一生平平无奇';
           $bean->setLuck(rand(0,5));
       }
        if($levelLuck>=80&&$levelLuck<95){
            $playerInfoStr.='-机缘一般';
            $bean->setLuck(rand(5,25));
        }
        if($levelLuck>=95){
            $playerInfoStr.='-机缘极高';
            $bean->setLuck(rand(20,50));
        }
        //性格
       $bean->setCharacter('0');
       $bean->setThing(['新手指南']);
       $bean->setMaxWeightBearing(100);
       $bean->setBank(0);
       $bean->setBirthplace('不知名');
       $bean->setLocation('未入世');
       $bean->setNote($playerInfoStr);
       //出生相关
       return $bean;
    }

}
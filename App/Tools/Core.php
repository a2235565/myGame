<?php
/**
 * Created by PhpStorm.
 * User: yangzhenyu
 * Date: 2018/12/10
 * Time: 下午1:33
 */

namespace App\Tools;

use App\Bean\People\BasicAttribute;
use App\Bean\People\Monster;
use App\Bean\People\Player;
use App\Bean\Skill\Lower;
use App\Bean\Skill\Satisfy;
use App\Bean\Skill\SkillEffect;
use EasySwoole\Component\Singleton;

class Core
{
    use Singleton;

    //获取真实属性
    public function getAttribute(BasicAttribute $info)
    {
        $info->setLifeValue($info->getLifeValue() + $info->getT() * 15);
        $info->setArmor($info->getArmor() + $info->getT() * 0.6);
        $info->setDodge($info->getDodge() + $info->getM() * 0.5);
        $info->setHit($info->getHit() + $info->getM() * 0.7);
        $info->setDps($info->getDps() + $info->getM() * 0.3);
        $info->setFirst($info->getFirst() + $info->getM() * 0.3);
        $info->setDps($info->getDps() + $info->getL() * 1.1);
        $info->setHit($info->getHit() + $info->getL() * 0.1);
        $info->setDps($info->getDps() + $info->getZ() * 0.2);
        $info->setHit($info->getHit() + $info->getZ() * 0.2);
        $info->setFirst($info->getFirst() + $info->getZ() * 0.2);
        //心情
        $info->setDps( $info->getDps()+$info->getDps()*(10-$info->getMood())*0.05);
        $info->setHit( $info->getHit()-$info->getHit()*(10-$info->getMood())*0.1);
        //伤势
        $info->setHit($info->getHit()*(10-$info->getInjury())/10);
        $info->setDps($info->getDps()*(10-$info->getInjury())/10);
        $info->setFirst($info->getFirst()*(10-$info->getInjury())/10);
        $info->setDodge($info->getDodge()*(10-$info->getInjury())/10);
        $info->setArmor($info->getArmor()*(10-$info->getInjury())/10);
        $info->setLifeValue($info->getLifeValue()*(10-$info->getInjury())/10);
        return $info;
    }


    /**
     * attackInfo
     * @param Lower          $skill
     * @param BasicAttribute $player
     * @return array
     * @author yangzhenyu
     * Time: 下午4:28
     */
    public function attackInfo(Lower $skill, BasicAttribute $player)
    {
        $run = 1;
        $l = $skill->getSatisfy()->getL();
        $m = $skill->getSatisfy()->getM();
        $z = $skill->getSatisfy()->getZ();
        $t = $skill->getSatisfy()->getT();
        $need = $skill->getSatisfy()->getNeedSkill();
        $PlayerSkill = $player->getSkill();
        $PlayerSkill = $PlayerSkill['code'];
        if (!empty($need)&&!array_intersect($need, $PlayerSkill)==$need) {
            $run -= 0.5;
        }
        if ($l > $player->getL()) {
            $run -= 0.1;
        }
        if ($m > $player->getM()) {
            $run -= 0.1;
        }
        if ($t > $player->getT()) {
            $run -= 0.1;
        }
        if ($z > $player->getZ()) {
            $run -= 0.1;
        }
        $rand = mt_rand(0, 100);
        $orderDebuff = [];
        $selfBuff = [];
        $firstRule = $skill->getEffect()->getFirst();
        $selfBuff['first'] = $player->getFirst();
        $orderDebuff['first'] = 0;
        foreach ($firstRule as $item) {
            if ($rand < $item['odds']) {
                if ($item['let'] == SkillEffect::FOR_SELF) {
                    $selfBuff['first'] = $selfBuff['first'] * $run * $item['do'];
                } else {
                    $orderDebuff['first'] = $run * $item['do'];
                }
            }
        }
        $selfBuff['lifeValue'] = 0;
        $orderDebuff['lifeValue'] = 0;
        $LifeRule = $skill->getEffect()->getLifeValue();
        if($LifeRule){
            foreach ($LifeRule as $item) {
                if ($rand < $item['odds']) {
                    if ($item['let'] == SkillEffect::FOR_SELF) {
                        $selfBuff['lifeValue'] =  $player->getLifeValue() * $run * $item['do'];
                    } else {
                        $orderDebuff['lifeValue'] = $run * $item['do'];
                    }
                }
            }
        }


        $HitRule = $skill->getEffect()->getHit();
        $selfBuff['hit'] = $player->getHit();
        $orderDebuff['hit'] = 0;
        if($HitRule){
            foreach ($HitRule as $item) {
                if ($rand < $item['odds']) {
                    if ($item['let'] == SkillEffect::FOR_SELF) {
                        $selfBuff['hit'] =    $selfBuff['hit'] * $run * $item['do'];
                    } else {
                        $orderDebuff['hit'] = $run * $item['do'];
                    }
                }
            }
        }

        $DpsRule = $skill->getEffect()->getDps();
        $selfBuff['dps'] = $player->getDps();
        $orderDebuff['dps'] = 0;
        if($DpsRule){
            foreach ($DpsRule as $item) {
                if ($rand < $item['odds']) {
                    if ($item['let'] == SkillEffect::FOR_SELF) {
                        $selfBuff['dps'] =    $selfBuff['dps'] * $run * $item['do'];
                    } else {
                        $orderDebuff['dps'] = $run * $item['do'];
                    }
                }
            }
        }

        $DodgeRule = $skill->getEffect()->getDodge();
        $selfBuff['dodge'] = $player->getDodge();
        $orderDebuff['dodge'] = 0;
        if($DodgeRule){
            foreach ($DodgeRule as $item) {
                if ($rand < $item['odds']) {
                    if ($item['let'] == SkillEffect::FOR_SELF) {
                        $selfBuff['dodge'] =    $selfBuff['dodge'] * $run * $item['do'];
                    } else {
                        $orderDebuff['dodge'] = $run * $item['do'];
                    }
                }
            }
        }

        $ArmorRule = $skill->getEffect()->getArmor();
        $selfBuff['armor'] = $player->getArmor();
        $orderDebuff['armor'] = 0;
        if($ArmorRule){
            foreach ($ArmorRule as $item) {
                if ($rand < $item['odds']) {
                    if ($item['let'] == SkillEffect::FOR_SELF) {
                        $selfBuff['armor'] =    $selfBuff['armor'] * $run * $item['do'];
                    } else {
                        $orderDebuff['armor'] = $run * $item['do'];
                    }
                }
            }
        }

        $BankRule = $skill->getEffect()->getBank();
        $selfBuff['bank'] = 0;
        $orderDebuff['bank'] = 0;
        if($BankRule){
            foreach ($BankRule as $item) {
                if ($rand < $item['odds']) {
                    if ($item['let'] == SkillEffect::FOR_SELF) {
                        $selfBuff['bank'] =   $run * $item['do'];
                    } else {
                        $orderDebuff['bank'] = $run * $item['do'];
                    }
                }
            }
        }

        return [
            'self'=>$selfBuff,
            'develop'=>$run,
            'other'=>$orderDebuff
        ];

    }


    function attackOne(BasicAttribute $people)
    {
        //随机释放技能
        $skill = $people->getSkill();

        if(empty($skill['decode'])){
            $tooles = new DataTools();

            $skillList = [];
            foreach ($skill as $v){
                $data = $tooles->getSkill($v);
                if($data){
                    $data['effect'] = new \App\Bean\Skill\SkillEffect($data['effect']);
                    $skillList[]=$data;
                }
            }
            $skill = ['code'=>$skill,'decode'=>$skillList];
            $people->setSkill($skill);
        }
        $skillIndex = mt_rand(0, count($skill['decode']) - 1);
        $rand = mt_rand(0,100);
        if($rand<$skill['decode'][$skillIndex]['trigger']){
            $skill['decode'][$skillIndex]['satisfy'] = new Satisfy($skill['decode'][$skillIndex]['satisfy']);
            $skill = new \App\Bean\Skill\Super($skill['decode'][$skillIndex]);
            $arr = $this->attackInfo(
                $skill, $people
            );
            return array_merge($arr, ['skillName' => $skill->getName()]);
        }else{
            return [
                'skillName'=>'使用技能失败',

            ];
        }
    }



    //开始战斗
    function PlayStart(BasicAttribute $user1, BasicAttribute $user2)
    {
        $user1L = $user1->getLifeValue();
        $user2L = $user2->getLifeValue();
        $log = [];
        $int = 0;
        $res = true;
        $first = $user1->getFirst()<$user2->getFirst()?2:1;
        $two = $first==2?1:2;
        $firstUser = 'user'.$first;
        $twoUser = 'user'.$two;
        $firstUserL = 'user'.$first.'L';
        $twoUserL = 'user'.$two.'L';
        while (true) {
            //大于100回合退出
            if ($int > 100) {
                return false;
            }
            $int++;
            $dps1 = $this->attackOne(${$firstUser});
            $dps2 = $this->attackOne(${$twoUser});

            //金币结算
            if(!empty($dps1['other']['bank'])&&$dps1['other']['bank']>0){
                ${$firstUser}->setBank(${$firstUser}->getBank()+ ${$twoUser}->getBank()*$dps1['other']['bank']);
                $log[] = ${$firstUser}->getName().'使用了：'
                    .$dps1['skillName'].'偷取了'.${$twoUser}->getBank()*$dps1['other']['bank'];

            }
            if(!empty($dps2['other']['bank'])&&$dps2['other']['bank']>0){
                ${$twoUser}->setBank(${$twoUser}->getBank()+ ${$firstUser}->getBank()*$dps2['other']['bank']);
                $log[] = ${$twoUser}->getName().'使用了：'
                    .$dps2['skillName'].'偷取了'. ${$firstUser}->getBank()*$dps2['other']['bank'];
            }


            if(!empty($dps1['self']['bank'])&&$dps1['self']['bank']>0){
                ${$firstUser}->setBank(${$firstUser}->getBank()+ ${$firstUser}->getBank()*$dps1['self']['bank']);
                $log[] = ${$firstUser}->getName().'使用了：'
                    .$dps1['skillName'].'花费了：'.${$firstUser}->getBank()*$dps1['self']['bank'];

            }
            if(!empty($dps2['self']['bank'])&&$dps2['self']['bank']>0){
                ${$twoUser}->setBank(${$twoUser}->getBank()+ ${$twoUser}->getBank()*$dps2['self']['bank']);
                $log[] = ${$twoUser}->getName().'使用了：'
                    .$dps2['skillName'].'花费了：'. ${$twoUser}->getBank()*$dps2['self']['bank'];
            }




            //治疗或伤害结算
            $u1zz=0;
            if(!empty($dps1['self']['lifeValue'])&&$dps1['self']['lifeValue']>0){
                $u1zz=1;
                $log[] = ${$firstUser}->getName().'使用了：'
                    .$dps1['skillName'].'恢复了'.$dps1['self']['lifeValue'].'点气血'
                ."-发挥".($dps1['develop']*10).'成水平';
                ${$firstUserL}+=$dps1['self']['lifeValue'];
            }
            $u2zz=0;
            if(!empty($dps2['self']['lifeValue'])&&$dps2['self']['lifeValue']>0){
                $u2zz=1;
                $log[] = ${$twoUser}->getName().'使用了：'
                    .$dps2['skillName'].'恢复了'.$dps2['self']['lifeValue'].'点气血' ."-发挥".($dps2['develop']*10).'成水平';
                ${$twoUserL}+=$dps2['self']['lifeValue'];
            }





            //伤害结算
            $one = $this->dpsCount($dps1, $dps2);
            if($one['user1']!=0){
                $log[] = ${$firstUser}->getName().
                    '使用了：'.$dps1['skillName'].'造成'.$one['user1'].'点伤害' ."-发挥".($dps1['develop']*10).'成水平';;
            }else if($u1zz!=1){
                $log[] = ${$firstUser}->getName().
                    '使用了：'.$dps1['skillName'].'造成打了一个寂寞';
            }

            ${$twoUserL}-=$one['user1'];
            if(${$twoUserL}-$one['user1']<=0){
                $res = $firstUser;
                $log[] = ${$twoUser}->getName().'倒地身亡';
                break;
            }

            if($one['user2']!=0){
                $log[] = ${$twoUser}->getName().'使用了：'.$dps2['skillName'].'造成'.$one['user2'].'点伤害' ."-发挥".(($dps1['develop']??0)*10).'成水平';;
            }else if($u2zz!=1){
                $log[] = ${$twoUser}->getName().
                    '使用了：'.$dps2['skillName'].'造成打了一个寂寞';
            }

            ${$firstUserL}-=$one['user2'];
            if(${$firstUserL}-$one['user2']<=0){
                $res = $twoUser;
                $log[] = ${$firstUser}->getName().'倒地身亡';
                break;
            }
        }
        return [
            'res' => $res,
            'user1'=>$user1,
            'user2'=>$user2,
            'log'=>$log
        ];
    }

    function PlayerWinnerRun($userId, $mInfo, Player $userInfo, &$log)
    {
        $list = $this->winner($mInfo, $userInfo, $log);
        $exp = $userInfo->getExperience();
        $userInfo->setExperience($exp + $list['exp']);
        $skill = [];
        foreach ($userInfo->getSkill() as $v) {
            $skill[] = $v['skillName'];
        }
        $userInfo->setSkill($skill);

        if (!empty($list['skill'])) {
            $beibao = $userInfo->getWeightBearing();
            $wuping = array_merge($beibao, [$list['skill']]);
            $maxBeibao = $userInfo->getMaxWeightBearing();
            if (count($wuping) <= $maxBeibao) {
                $userInfo->setWeightBearing($wuping);
            }
        }
        if (!empty($list['money'])) {
            $bank = $userInfo->getBank();
            $userInfo->setBank($bank + $list['money']);
        }

        $tools = new DataTools();
        $tools->setPlayerData($userId, $userInfo);
    }

    function winner(Monster $m, Player $p, &$log)
    {
        $rs = $m->getDropRule();
        $rs['rule'];
        $return = [];
        $rand = mt_rand(0, 99);
        foreach ($rs['rule'] as $v) {
            if ($v['odds'] + $p->getLuck() * $rs['luckRule'] >= 100) {
                $temp = $this->getTing(key($v['thing']), $v['thing'][key($v['thing'])]);
                $log[] = $temp['str'];
                $return = array_merge($return, $temp['get']);
            } else {
                if ($rand < $v['odds'] + $p->getLuck() * $rs['luckRule']) {
                    $temp = $this->getTing(key($v['thing']), $v['thing'][key($v['thing'])]);
                    $log[] = $temp['str'];
                    $return = array_merge($return, $temp['get']);
                }
            }
        }
        return $return;
    }


    function getTing($k, $v)
    {
        switch ($k) {
            case 'exp':
                $str = '您获得' . $v . '点经验';
                return [
                    'get' => ['exp' => $v],
                    'str' => $str
                ];
                break;
            case 'money':
                $str = '您获得' . $v . '点金币';
                return [
                    'get' => ['money' => $v],
                    'str' => $str
                ];
                break;
            case 'skill':
                $str = '您获得' . $v . '技能书';
                return [
                    'get' => ['skill' => $v],
                    'str' => $str
                ];
                break;
            case 'ting':
                $str = '您获得' . $v . '';
                return [
                    'get' => ['ting' => $v],
                    'str' => $str
                ];
                break;
        }
    }



    /**
     * dpsCount
     * @param $user1
     * @param $user2
     * @return array
     * @author yangzhenyu
     * Time: 下午5:20
     *
     */
    public function dpsCount($user1, $user2)
    {

        if(empty($user1['bad'])){
            if(!empty($user1['other']))
            foreach($user1['other'] as $k=>$v){
                if(isset($user2['self'][$k]))
                  $user2['self'][$k]*=(1-$v);
            }
        }
        if(empty($user2['bad'])){
            if(!empty($user2['other']))
            foreach($user2['other'] as $k=>$v){
                if(isset($user1['self'][$k]))
                    $user1['self'][$k]*=(1-$v);
            }
        }


        $rs = [];
        $rs['user1'] = 0;
        if(empty($user1['bad'])){
            if ($this->isHit($user1['self']['hit']??0, $user2['self']['dodge']??0)) {
                $rs['user1'] = $this->injuryResult($user1['self']['dps']??0, $user2['self']['armor']??0);
            }
        }

        $rs['user2'] = 0;
        if(empty($user2['bad'])) {
            if ($this->isHit($user2['self']['hit']??0, $user1['self']['dodge']??0)) {
                $rs['user2'] = $this->injuryResult($user2['self']['dps']??0, $user1['self']['armor']??0);
            }
        }

        return $rs;
    }

    /**
     * 命中率 是否命中
     * isHit
     * @param $hit
     * @param $dodge
     * @return bool
     * @author yangzhenyu
     * Time: 下午1:33
     */
    public function isHit($hit, $dodge)
    {
        if ($hit - $dodge < 0) {
            $mingzhong = 100 + ($hit - $dodge) * 1;
            $rand = mt_rand(0, 100);
            if ($rand < $mingzhong) {
                return true;
            }
            return false;
        } else {
            return true;
        }
    }

    /**
     * 伤害结果
     * injuryResult
     * @param $dps
     * @param $ad
     * @return int
     * @author yangzhenyu
     * Time: 下午1:34
     */
    public function injuryResult($dps, $ad)
    {
        if (($injury = $dps - $ad) < 0) {
            return 0;
        } else {
            return $injury;
        }
    }

    /**
     * 战斗力计算
     * getCombat
     * @param BasicAttribute $playInfo
     * @return float|int
     * @author yangzhenyu
     * Time: 13:59
     */
    function getCombat(BasicAttribute $playInfo){
        $number = 0;
        $playInfo = $this->getAttribute($playInfo);
        $number+=$playInfo->getLifeValue()*0.05;
        $number+=$playInfo->getArmor()*0.3;
        $number+= $playInfo->getDodge()*0.1;
        $number+= $playInfo->getDps()*0.5;
        $number+= $playInfo->getFirst()*0.3;
        $number+= $playInfo->getHit()*0.2;
        return $number;
    }
}

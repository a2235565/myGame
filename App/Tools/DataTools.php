<?php
namespace App\Tools;
use App\Bean\People\Monster;
use App\Bean\People\Player;
use App\Bean\Skill\Lower;
use App\Bean\Skill\Middle;
use App\Bean\Skill\Super;
use EasySwoole\Utility\File;

/**
 * 数据设置获取类
 * Class PlayerGenerator
 */
class DataTools
{
    protected $PlayerPath;
    protected $SysPath;

    /**
     * DataTools constructor.
     * @param null $PlayerPath //绝对路径   /Home/App/
     */
    function __construct($PlayerPath=null)
    {
        $PlayerPath?( $this->PlayerPath = $PlayerPath):( $this->PlayerPath = EASYSWOOLE_ROOT.'/App/Data/Player/');
        $this->SysPath = EASYSWOOLE_ROOT.'/App/Data/Sys/';

        return $this;
    }

    function __setPlayerBefore($userId){
        if(!is_dir($this->PlayerPath.$userId)){
            File::createDirectory($this->PlayerPath.$userId);
        }
    }


    /**
     * setPlayerData
     * @param        $userId
     * @param Player $con
     * @author yangzhenyu
     * Time: 下午2:27
     */
    function setPlayerData($userId,Player $con){
        $this->__setPlayerBefore($userId);
        $con = json_encode($con->toArray());
        File::createFile($this->PlayerPath.$userId.'/userInfo.json',$con);
    }

    /**
     * getPlayerData
     * @param $userId
     * @return Player|null
     * @author yangzhenyu
     * Time: 上午9:53
     */
    function getPlayerData($userId){
        $fileName = $this->PlayerPath.$userId.'/userInfo.json';
        if(file_exists($fileName)){
            $userInfo = new Player(json_decode(file_get_contents($fileName),1));
            $tempList = $userInfo->getSkill();
            $skillList = [];
            foreach ($tempList as $v){
                $data = $this->getSkill($v);
                if($data){
                    $data['effect'] = new \App\Bean\Skill\SkillEffect($data['effect']);
                    $skillList[]=$data;
                }

            }
            $userInfo->setSkill(['decode'=>$skillList,'code'=>$userInfo->getSkill()]);
            return $userInfo;
        }
        else
            return null;
    }


    /**
     * setPlayerData
     * @param        $userId
     * @param Monster $con
     * @author yangzhenyu
     * Time: 下午2:27
     */
    function setMonsterData($userId,Monster $con){
        $fileName = $this->SysPath.'/Monster/'.$userId.'.json';
        $con = json_encode($con->toArray());
        File::createFile($fileName,$con);
    }

    /**
     * getPlayerData
     * @param $userId
     * @return Monster|null
     * @author yangzhenyu
     * Time: 上午9:53
     */
    function getMonsterData($userId){
        $fileName = $this->SysPath.'/Monster/'.$userId.'.json';
        if(file_exists($fileName)){
            $m = new Monster(json_decode(file_get_contents($fileName),1));
            $tempList = $m->getSkill();
            $skillList = [];
            foreach ($tempList as $v){
                $data = $this->getSkill($v);
                if($data){
                    $data['effect'] = new \App\Bean\Skill\SkillEffect($data['effect']);
                    $skillList[]=$data;
                }
            }
            $m->setSkill(['decode'=>$skillList,'code'=>$m->getSkill()]);
            return $m;
        }
        else
            return null;
    }

    /**
     * setSkill
     * @param $fileName
     * @param $level
     * @param $bean Lower|Middle|Super
     * @author yangzhenyu
     * Time: 上午10:49
     */
    function setSkill($fileName,$level,$bean){
        switch ($level){
            case 1:
                $data = $bean->toArray();
                $data['level'] = 1;
                File::createFile($this->SysPath.'/Skill/'.$fileName.'.json',json_encode($data));
                break;
            case 2:
                break;
            case 3:
                break;
        }
    }


    function getSkill($skillName){
        $fileName = $this->SysPath.'/Skill/'.$skillName.'.json';
        if(file_exists($fileName))
            return (json_decode(file_get_contents($fileName),1));
        else
            return null;
    }


    /**
     * setSys
     * @param $fileName
     * @param $bean
     * @author yangzhenyu
     * Time: 上午11:13
     */
    function setSys($fileName,$bean){
        $data = $bean->toArray();
        File::createFile($this->SysPath.$fileName.'.json',json_encode($data));
    }

    /**
     * getSys
     * @param $skillName
     * @return mixed|null
     * @author yangzhenyu
     * Time: 上午11:13
     */
    function getSys($skillName){
        $fileName = $this->SysPath.'/'.$skillName.'.json';
        if(file_exists($fileName))
            return (json_decode(file_get_contents($fileName),1));
        else
            return null;
    }


    /**
     * kill 删库跑路
     * @param $userId
     * @author yangzhenyu
     * Time: 上午10:09
     */
    function kill($userId){
        File::deleteDirectory($this->PlayerPath.$userId);
    }


}
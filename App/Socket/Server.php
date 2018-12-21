<?php
/**
 * Created by PhpStorm.
 * User: yangzhenyu
 * Date: 2018/12/14
 * Time: 上午9:12
 */

namespace App\Socket;


use App\Bean\People\Player;
use App\Tools\Core;
use Composer\Cache;

class Server
{
    protected $tools;
    function __construct()
    {
        $this->tools = new \App\Tools\DataTools();
    }

    function getUserId($id){

        return ($id-321)>>3;

    }

    function server($server,$frame){
        $json = json_decode($frame->data,1);
        switch ($json['action']){
            case 'heartbeat':
                break;
            case 'getRegion':
                $list = $this->getRegion();
                $server->push($frame->fd,json_encode($list+["action"=>"getRegion"]));
                break;
            case 'getPlace':
                $list = $this->getPlace();
                $server->push($frame->fd,json_encode($list+["action"=>"getPlace"]));
                break;
            case 'birthplace':
                $this->birthplaceSelect($json,$frame->fd,$server,$frame);
                break;
            case 'playBoss':
                $this->playBoss($json,$this->getUserId($json['userId']),$server,$frame);
                break;
            case 'userInfo':
                $this->userInfo($this->getUserId($json['userId']),$server,$frame);
                break;
            case 'mInfo':
                $this->mInfo($json,$server,$frame);
                break;
            case 'skill':
                $this->skillInfo($json['do_run'],$server,$frame);
                break;
            case 'thing':
//                $this->thingInfo($this->getUserId($json['userId']),$server,$frame);
                break;
            case 'quality':
//                $this->qualityInfo($this->getUserId($json['userId']),$server,$frame);
                break;
        }
    }

    function skillInfo($name,$server,$frame){
       $server->push($frame->fd, json_encode($this->tools->getSkill($name)+["action"=>"skillInfo"]));
    }


    function getRegion(){
       $list = scandir(EASYSWOOLE_ROOT.'/App/Data/Sys/Region/');
       unset($list[0],$list[1]);
       $return = [];
       foreach ($list as $v){
           $return[] = $v;
       }
       return $return;
    }

    function getPlace(){
        $list = scandir(EASYSWOOLE_ROOT.'/App/Data/Sys/Place/');
        unset($list[0],$list[1]);
        $return = [];
        foreach ($list as $v){
            $temp = explode('.json',$v);

            $return[] = $this->tools->getSys('Place/'.$temp[0]);
        }
        return $return;
    }

    function heartbeat(){
        return true;
    }

    function birthplaceSelect($json,$userId,$server,$frame){
        $g=new \App\Tools\Generator();
        $tools = $this->tools;
        $core = \App\Tools\Core::getInstance();
        $userInfo = $tools->getPlayerData($userId);
        $Blist = [
            '0'=>'无名地带',
            '1'=>'沧海',
        ];
        if(!empty($json['name'])){
            $userInfo->setName($json['name']);
            $skill = $userInfo->getSkill();
            $userInfo->setSkill($skill['code']);
            $tools->setPlayerData($userId,$userInfo);
            $server->push($frame->fd, json_encode($userInfo));
        }

        if(intval($json['b'])<1){
            return false;
        }
        $userInfo = $tools->getPlayerData($userId);

        $g->playerSelectBirthplace($Blist[intval($json['b'])],$userInfo);
        $userInfo = $core->getAttribute($userInfo);
        $server->push($frame->fd, json_encode($userInfo+['action'=>"birthplace"]));
    }

    function playBoss($json,$userId,$server,$frame){
        $tools = $this->tools;
        $core = \App\Tools\Core::getInstance();
        $userInfo = $this->getUserInfo($userId);
        $mInfo = $tools->getMonsterData($json['m']);
        if(empty($mInfo)) return false;
        $userInfo = $core->getAttribute($userInfo);
        $mInfo = $core->getAttribute($mInfo);
        $mInfo1=$mInfo;
        $server->push($frame->fd, json_encode($userInfo));
        $rs = $core->PlayStart($userInfo,$mInfo);
        $server->push($frame->fd, json_encode(["rs"=>$rs['log'],'res'=>$rs['res'],'m'=>$mInfo1,'action'=>"playBoss"]));

    }

    function userInfo($userId,$server,$frame){
//        $tools = $this->tools;
        $userInfo =
        \EasySwoole\EasySwoole\FastCache\Cache::getInstance()->get('userInfo'.$userId);
        $userInfo = new Player($userInfo);
        $core = Core::getInstance();
        $userInfo = $core->getAttribute($userInfo);
        $server->push($frame->fd, json_encode($userInfo->toArray()+["action"=>"userInfo"]));
    }
    function mInfo($json,$server,$frame){
        $tools = $this->tools;
        $mInfo = $tools->getMonsterData($json['m']);
        $server->push($frame->fd, json_encode($mInfo->toArray()+["action"=>"mInfo"]));
    }


    function getUserInfo($userId){
        $userInfo =
            \EasySwoole\EasySwoole\FastCache\Cache::getInstance()->get('userInfo'.$userId);
        $userInfo = new Player($userInfo);
        return $userInfo;
    }

    function createUser($req){
        return true;
        $g=new \App\Tools\Generator();
        $p = $g->player();
        $p->setName('无名');
        $tools = new \App\Tools\DataTools();
        $tools->setPlayerData($req->fd,$p);
    }
}
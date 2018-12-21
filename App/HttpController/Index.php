<?php
/**
 * Created by PhpStorm.
 * User: yf
 * Date: 2018/8/9
 * Time: 下午1:45
 */

namespace App\HttpController;




use App\Tools\Generator;
use  \EasySwoole\EasySwoole\FastCache\Cache;
use EasySwoole\Http\AbstractInterface\Controller;

class Index extends Controller
{

    function index()
    {
        $this->response()->redirect('/youxi.html');
    }

    function userLogin(){
        $user = 123;
        $pass = 123;
        $param = $this->request()->getRequestParam();
        if($param['user']==$user&&$param['pass']==$pass){
            $userId=1;
//            var_dump('userInfo'.$userId);
            if(!($u=Cache::getInstance()->get('userInfo'.$userId))){
                $g = new Generator();
                $userInfo = $g->player();
                $userInfo->setName('无名氏');
                $userInfo->setUserId($userId);
                $u = $userInfo->toArray();
                Cache::getInstance()->set('userInfo'.$userId,$u);
            }
            $this->response()->setCookie('userId',($userId<<3)+321);

            $this->writeJson(
              200,$u+['userId'=>$userId],'success'
            );
        }else{
            $this->writeJson(200,[],'user fail');
        }
    }

    function auth(){
        $userId = intval($this->request()->getRequestParam('userId'));
        $userId = ($userId -321)>>3;
        if(Cache::getInstance()->get('userInfo'.$userId)){
           $this->writeJson(200,'success','success');
        }else{
            $this->writeJson(200,[],'fail');
        }
    }
}
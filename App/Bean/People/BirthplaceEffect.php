<?php
/**
 * Created by PhpStorm.
 * User: yangzhenyu
 * Date: 2018/12/12
 * Time: 上午10:17
 */

namespace App\Bean\People;


use EasySwoole\Spl\SplBean;

class BirthplaceEffect extends SplBean
{
    protected $basic; //属性加成 {"t":1,"m":-1,"z":-1,"l":1,"lifeValue":20}
    protected $skill; //技能加成 [{"odds":10,"skill":'回血'}]

    /**
     * @return mixed
     */
    public function getBasic()
    {
        return $this->basic;
    }

    /**
     * @param mixed $basic
     */
    public function setBasic($basic): void
    {
        $this->basic = $basic;
    }

    /**
     * @return mixed
     */
    public function getSkill()
    {
        return $this->skill;
    }

    /**
     * @param mixed $skill
     */
    public function setSkill($skill): void
    {
        $this->skill = $skill;
    }


}
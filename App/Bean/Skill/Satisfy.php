<?php
/**
 * Created by PhpStorm.
 * User: yangzhenyu
 * Date: 2018/12/10
 * Time: 上午10:18
 */

namespace App\Bean\Skill;


use EasySwoole\Spl\SplBean;

class Satisfy extends SplBean
{
    protected $l;
    protected $m;
    protected $t;
    protected $z;
    protected $needSkill;

    /**
     * @return mixed
     */
    public function getZ()
    {
        return $this->z;
    }

    /**
     * @param mixed $z
     */
    public function setZ($z): void
    {
        $this->z = $z;
    }



    /**
     * @return mixed
     */
    public function getL()
    {
        return $this->l;
    }

    /**
     * @param mixed $l
     */
    public function setL($l): void
    {
        $this->l = $l;
    }

    /**
     * @return mixed
     */
    public function getM()
    {
        return $this->m;
    }

    /**
     * @param mixed $m
     */
    public function setM($m): void
    {
        $this->m = $m;
    }

    /**
     * @return mixed
     */
    public function getT()
    {
        return $this->t;
    }

    /**
     * @param mixed $t
     */
    public function setT($t): void
    {
        $this->t = $t;
    }

    /**
     * @return mixed
     */
    public function getNeedSkill()
    {
        return $this->needSkill;
    }

    /**
     * @param mixed $needSkill
     */
    public function setNeedSkill($needSkill): void
    {
        $this->needSkill = $needSkill;
    }

}
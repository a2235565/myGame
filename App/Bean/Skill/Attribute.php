<?php
/**
 * Created by PhpStorm.
 * User: yangzhenyu
 * Date: 2018/12/10
 * Time: 上午10:33
 */

namespace App\Bean\Skill;


use EasySwoole\Spl\SplBean;

class Attribute extends SplBean
{
    protected $l;//力
    protected $m;//敏
    protected $t;//体
    protected $hit;//命中
    protected $dps;//伤害
    protected $AD;//防御
    protected $dodge;//躲避

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
    public function getHit()
    {
        return $this->hit;
    }

    /**
     * @param mixed $hit
     */
    public function setHit($hit): void
    {
        $this->hit = $hit;
    }

    /**
     * @return mixed
     */
    public function getDps()
    {
        return $this->dps;
    }

    /**
     * @param mixed $dps
     */
    public function setDps($dps): void
    {
        $this->dps = $dps;
    }

    /**
     * @return mixed
     */
    public function getAD()
    {
        return $this->AD;
    }

    /**
     * @param mixed $AD
     */
    public function setAD($AD): void
    {
        $this->AD = $AD;
    }

    /**
     * @return mixed
     */
    public function getDodge()
    {
        return $this->dodge;
    }

    /**
     * @param mixed $dodge
     */
    public function setDodge($dodge): void
    {
        $this->dodge = $dodge;
    }

}
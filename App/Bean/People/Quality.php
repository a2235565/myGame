<?php
/**
 * Created by PhpStorm.
 * User: yangzhenyu
 * Date: 2018/12/12
 * Time: 上午9:48
 */

namespace App\Bean\People;


use EasySwoole\Spl\SplBean;

class Quality extends SplBean
{
    const HIT_ADD = 'hit';
    const DPS_ADD = 'dps';
    const DODGE_ADD = 'dodge';
    const ARMOR_ADD = 'armor';
    protected $qualityName;//体质名称
    protected $effect;// [{"let"=>HIT_ADD,"effect"=>10}]#效果为百分比

    /**
     * @return mixed
     */
    public function getQualityName()
    {
        return $this->qualityName;
    }

    /**
     * @param mixed $qualityName
     */
    public function setQualityName($qualityName): void
    {
        $this->qualityName = $qualityName;
    }

    /**
     * @return mixed
     */
    public function getEffect()
    {
        return $this->effect;
    }

    /**
     * @param mixed $effect //[{"let"=>HIT_ADD,"effect"=>10}]#效果为百分比
     */
    public function setEffect($effect): void
    {
        $this->effect = $effect;
    }

}
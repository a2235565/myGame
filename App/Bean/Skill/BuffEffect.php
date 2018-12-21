<?php
/**
 * Created by PhpStorm.
 * User: yangzhenyu
 * Date: 2018/12/10
 * Time: 上午10:42
 */

namespace App\Bean\Skill;


class BuffEffect
{
    protected $dps;//伤害
    protected $dodge;//躲避
    protected $ad;//防御
    protected $lifeValue;//气血

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

    /**
     * @return mixed
     */
    public function getAd()
    {
        return $this->ad;
    }

    /**
     * @param mixed $ad
     */
    public function setAd($ad): void
    {
        $this->ad = $ad;
    }

    /**
     * @return mixed
     */
    public function getLifeValue()
    {
        return $this->lifeValue;
    }

    /**
     * @param mixed $lifeValue
     */
    public function setLifeValue($lifeValue): void
    {
        $this->lifeValue = $lifeValue;
    }


}
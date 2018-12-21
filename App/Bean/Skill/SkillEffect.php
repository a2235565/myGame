<?php
/**
 * Created by PhpStorm.
 * User: yangzhenyu
 * Date: 2018/12/10
 * Time: 上午10:12
 */

namespace App\Bean\Skill;


use EasySwoole\Spl\SplBean;

class SkillEffect extends SplBean
{
    const FOR_SELF = 'self';
    const FOR_OTHER = 'other';
    protected $dps;//伤害 #[{"odds"=>100,"let":FOR_SELF,'do'=>1.0}]
    protected $hit;//命中 #[{"odds"=>100,"let":FOR_SELF,'do'=>0.8}]
    protected $dodge;//闪避
    protected $armor;//护甲
    protected $first;//先攻
    protected $bank;
    protected $lifeValue;

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
    public function getArmor()
    {
        return $this->armor;
    }

    /**
     * @param mixed $armor
     */
    public function setArmor($armor): void
    {
        $this->armor = $armor;
    }

    /**
     * @return mixed
     */
    public function getFirst()
    {
        return $this->first;
    }

    /**
     * @param mixed $first
     */
    public function setFirst($first): void
    {
        $this->first = $first;
    }

    /**
     * @return mixed
     */
    public function getBank()
    {
        return $this->bank;
    }

    /**
     * @param mixed $bank
     */
    public function setBank($bank): void
    {
        $this->bank = $bank;
    }//bank



}
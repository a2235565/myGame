<?php
namespace App\Bean\People;


use EasySwoole\Spl\SplBean;

/**
 * 物品掉落规则
 * Class DropRule
 * @package App\Bean\People
 */
class DropRule extends SplBean
{
    protected $rule; //规则
    protected $luckRule;//规则跌属性
    //掉落物品
    const THING = 'thing';
    //掉落登记
    const LEVEL = 'level';
    //使用寿命
    const LIFE = 'life';
    //几率
    const ODDS = 'odds';
    /**
     * @return mixed
     */
    public function getRule()
    {
        return $this->rule;
    }

    /**
     * @param mixed $rule  [{odds:1,thing:''}]
     */
    public function setRule($rule): void
    {
        $this->rule = $rule;
    }

    /**
     * @return mixed
     */
    public function getLuckRule()
    {
        return $this->luckRule;
    }

    /**
     * @param mixed $luckRule  odds=odds+luck*luckRule
     */
    public function setLuckRule($luckRule): void
    {
        $this->luckRule = $luckRule;
    }

}
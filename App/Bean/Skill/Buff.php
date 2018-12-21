<?php
/**
 * Created by PhpStorm.
 * User: yangzhenyu
 * Date: 2018/12/10
 * Time: 上午10:38
 */

namespace App\Bean\Skill;


use EasySwoole\Spl\SplBean;

class Buff extends SplBean
{
    protected $name;
    protected $forSelf;
    protected $forAllMonster;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * getForSelf
     * @return BuffEffect
     * @author yangzhenyu
     * Time: 上午10:46
     */
    public function getForSelf():BuffEffect
    {
        return $this->forSelf;
    }

    /**
     * setForSelf
     * @param BuffEffect $forSelf
     * @author yangzhenyu
     * Time: 上午10:46
     */
    public function setForSelf(BuffEffect $forSelf): void
    {
        $this->forSelf = $forSelf;
    }

    /**
     * getForAllMonster
     * @return BuffEffect
     * @author yangzhenyu
     * Time: 上午10:46
     */
    public function getForAllMonster():BuffEffect
    {
        return $this->forAllMonster;
    }

    /**
     * setForAllMonster
     * @param BuffEffect $forAllMonster
     * @author yangzhenyu
     * Time: 上午10:46
     */
    public function setForAllMonster(BuffEffect $forAllMonster): void
    {
        $this->forAllMonster = $forAllMonster;
    }


}
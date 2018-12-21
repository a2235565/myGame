<?php
/**
 * Created by PhpStorm.
 * User: yangzhenyu
 * Date: 2018/12/12
 * Time: 上午10:13
 */

namespace App\Bean\People;

use EasySwoole\Spl\SplBean;

class Birthplace extends SplBean
{
    protected $name;
    protected $effect;

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
     * getEffect
     * @return BirthplaceEffect
     * @author yangzhenyu
     * Time: 上午10:23
     */
    public function getEffect():BirthplaceEffect
    {
        return $this->effect;
    }

    /**
     * @param BirthplaceEffect $effect
     */
    public function setEffect(BirthplaceEffect $effect): void
    {
        $this->effect = $effect;
    }

}
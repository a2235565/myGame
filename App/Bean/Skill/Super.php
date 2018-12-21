<?php
namespace App\Bean\Skill;
/**
 * 高级技能
 * Class Middle
 * @package Core\Skill
 */
class Super extends Middle
{
    protected $buff;//为人物新增Buff

    /**
     * @return mixed
     */
    public function getBuff():Buff
    {
        return $this->buff;
    }

    /**
     * setBuff
     * @param Buff $buff
     * @author yangzhenyu
     * Time: 上午10:45
     */
    public function setBuff(Buff $buff)
    {
        $this->buff = $buff;
    }

}
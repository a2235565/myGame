<?php
namespace App\Bean\Skill;
use EasySwoole\Spl\SplBean;
/**
 * 低阶技能
 * Class Lower
 * @package Core\Skill
 */
class Lower extends SplBean
{
    protected $name;//技能名称
    protected $effect;//技能效果
    protected $trigger;//触发几率
    protected $satisfy;//技能学习要求

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
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * getEffect
     * @return SkillEffect
     * @author yangzhenyu
     * Time: 上午10:17
     */
    public function getEffect():SkillEffect
    {
        return $this->effect;
    }

    /**
     * @param SkillEffect $effect
     */
    public function setEffect(SkillEffect $effect)
    {
        $this->effect = $effect;
    }

    /**
     * @return mixed
     */
    public function getTrigger()
    {
        return $this->trigger;
    }

    /**
     * @param mixed $trigger
     */
    public function setTrigger($trigger)
    {
        $this->trigger = $trigger;
    }

    /**
     * getSatisfy
     * @return Satisfy
     * @author yangzhenyu
     * Time: 上午10:32
     */
    public function getSatisfy():Satisfy
    {
        return $this->satisfy;
    }

    /**
     * setSatisfy
     * @param Satisfy $satisfy
     * @author yangzhenyu
     * Time: 上午10:31
     */
    public function setSatisfy(Satisfy $satisfy)
    {
        $this->satisfy = $satisfy;
    }

}
<?php
namespace App\Bean\Skill;
/**
 * 中阶技能
 * Class Middle
 * @package Core\Skill
 */
class Middle extends Lower
{
    protected $addAttribute;//增加人物属性

    /**
     * @return mixed
     */
    public function getAddAttribute():Attribute
    {
        return $this->addAttribute;
    }

    /**
     * @param mixed $addAttribute
     */
    public function setAddAttribute(Attribute $addAttribute)
    {
        $this->addAttribute = $addAttribute;
    }

}
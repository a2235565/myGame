<?php
namespace App\Bean\People;


/**
 * 野怪
 * Class Monster
 * @package Core\People
 */
class Monster extends BasicAttribute
{

    protected $location;//地点
    protected $drop;//掉落物品
    protected $dropRule;//各个物品掉落规则

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param mixed $location
     */
    public function setLocation($location): void
    {
        $this->location = $location;
    }

    /**
     * @return mixed
     */
    public function getDrop()
    {
        return $this->drop;
    }

    /**
     * @param mixed $drop
     */
    public function setDrop($drop): void
    {
        $this->drop = $drop;
    }

    /**
     * @return mixed
     */
    public function getDropRule()
    {
        return $this->dropRule;
    }

    /**
     * @param mixed $dropRule
     */
    public function setDropRule($dropRule): void
    {
        $this->dropRule = $dropRule;
    }

}
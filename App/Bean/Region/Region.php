<?php
namespace App\Bean\Region;
use EasySwoole\Spl\SplBean;

/**
 * 区域
 * Class Region
 * @package Core\Region
 */

class Region extends SplBean
{
    const SPRING = 1; #SPRING
    const SUMMER = 2; #SUMMER
    const AUTUMN = 3; #AUTUMN
    const WINTER = 4; #WINTER
    protected $name;//区域名称
    protected $season;//季节 #夏季 攻击提升 5%  冬 防御降低 10% ;
    protected $place = [];//区域列表
    protected $note;//地点描述

    /**
     * @return array
     */
    public function getPlace(): array
    {
        return $this->place;
    }

    /**
     * @param array $place
     */
    public function setPlace(array $place): void
    {
        $this->place = $place;
    }




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
     * @return mixed
     */
    public function getSeason()
    {
        return $this->season;
    }

    /**
     * @param mixed $season //   夏季 攻击提升 5%  冬 防御降低 10% ;
     */
    public function setSeason($season)
    {
        $this->season = $season;
    }
}
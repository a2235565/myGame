<?php
namespace App\Bean\People;


/**
 * 普通玩家
 * Class Player
 * @package Core\Character
 */
class Player extends BasicAttribute
{
    protected $userId;//机缘
    protected $luck;//机缘
    protected $character;//性格
    protected $maxWeightBearing;//最大负重 int
    protected $bank;//存款 int
    protected $birthplace;//出生地
    protected $location;//当前位置
    protected $experience;//经验值
    protected $freePoint=0;//剩余属性点


    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId): void
    {
        $this->userId = $userId;
    }
    /**
     * @return mixed
     */
    public function getFreePoint()
    {
        return $this->freePoint;
    }

    /**
     * @param mixed $freePoint
     */
    public function setFreePoint($freePoint): void
    {
        $this->freePoint = $freePoint;
    }




    /**
     * @return mixed
     */
    public function getLuck()
    {
        return $this->luck;
    }

    /**
     * @param mixed $luck
     */
    public function setLuck($luck): void
    {
        $this->luck = $luck;
    }

    /**
     * @return mixed
     */
    public function getCharacter()
    {
        return $this->character;
    }

    /**
     * @param mixed $character
     */
    public function setCharacter($character): void
    {
        $this->character = $character;
    }

    /**
     * @return array
     */
    public function getThing(): array
    {
        return $this->thing;
    }

    /**
     * @param array $thing
     */
    public function setThing(array $thing): void
    {
        $this->thing = $thing;
    }

    /**
     * @return mixed
     */
    public function getMaxWeightBearing()
    {
        return $this->maxWeightBearing;
    }

    /**
     * @param mixed $maxWeightBearing
     */
    public function setMaxWeightBearing($maxWeightBearing): void
    {
        $this->maxWeightBearing = $maxWeightBearing;
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
    }

    /**
     * @return mixed
     */
    public function getBirthplace()
    {
        return $this->birthplace;
    }

    /**
     * @param mixed $birthplace
     */
    public function setBirthplace($birthplace): void
    {
        $this->birthplace = $birthplace;
    }

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
    public function getExperience()
    {
        return $this->experience;
    }

    /**
     * @param mixed $experience
     */
    public function setExperience($experience): void
    {
        $this->experience = $experience;
    }

}
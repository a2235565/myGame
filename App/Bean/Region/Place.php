<?php
namespace App\Bean\Region;

/**
 * 地点
 * Class Place
 * @package Core\Region
 */
class Place extends Region
{
    const THING_CHANGE = 'thing';
    const SKILL_CHANGE = 'skill';
    const MONEY_CHANGE = 'money';
    const LEVEL_CHANGE = 'level';//一个月所增加等级
    const FIGHT_FALSE = '0';
    const FIGHT_TRUE = '1';
    const DIE = 'gameOver';
    protected $adventureList;//奇遇  比如遇到乞丐 智商+1 跟 运气挂钩
    protected $adventureRule;// [{"odds":10,"let"=>MONEY_CHANGE,"do"=>"-1000"}]
    protected $fight;//十分允许斗殴
    protected $fightRule;////斗殴结果 [{"odds":1,"let"=>DIE,"note"=>"被城管打死"}]
    protected $note; //描述
    protected $monsterList;// 怪物列表
    protected $monsterRule;// [{"odds":1,"touch"=>'乞丐'}]

    /**
     * @return mixed
     */
    public function getAdventureList()
    {
        return $this->adventureList;
    }

    /**
     * @param mixed $adventureList
     */
    public function setAdventureList($adventureList): void
    {
        $this->adventureList = $adventureList;
    }

    /**
     * @return mixed
     */
    public function getAdventureRule()
    {
        return $this->adventureRule;
    }

    /**
     * @param mixed $adventureRule [{"odds":10,"let"=>MONEY_CHANGE,"do"=>"-1000"}]
     */
    public function setAdventureRule($adventureRule): void
    {
        $this->adventureRule = $adventureRule;
    }

    /**
     * @return mixed
     */
    public function getFight()
    {
        return $this->fight;
    }

    /**
     * @param mixed $fight
     */
    public function setFight($fight): void
    {
        $this->fight = $fight;
    }

    /**
     * @return mixed
     */
    public function getFightRule()
    {
        return $this->fightRule;
    }

    /**
     * @param mixed $fightRule [{"odds":1,"let"=>DIE,"note"=>"被城管打死"}]
     */
    public function setFightRule($fightRule): void
    {
        $this->fightRule = $fightRule;
    }

    /**
     * @return mixed
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param mixed $note
     */
    public function setNote($note): void
    {
        $this->note = $note;
    }

    /**
     * @return mixed
     */
    public function getMonsterList()
    {
        return $this->monsterList;
    }

    /**
     * @param mixed $monsterList
     */
    public function setMonsterList($monsterList): void
    {
        $this->monsterList = $monsterList;
    }

    /**
     * @return mixed
     */
    public function getMonsterRule()
    {
        return $this->monsterRule;
    }

    /**
     * @param mixed $monsterRule // [{"odds":1,"touch"=>'乞丐'}]
     */
    public function setMonsterRule($monsterRule): void
    {
        $this->monsterRule = $monsterRule;
    }


}
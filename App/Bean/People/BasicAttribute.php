<?php
namespace App\Bean\People;
use EasySwoole\Spl\SplBean;

/**
 * 人物基本属性
 * Class BasicAttribute
 * @package Core\Character
 */
class BasicAttribute extends SplBean
{
    protected $lifeValue;//血量 int
    protected $life; //寿命
    protected $maxLife = 12*60;//最大寿元 月
    protected $bank; //钱
    protected $name; //名字
    protected $level;//等级 int
    protected $skill = ['左钩拳'];//技能 array
    protected $skillBuff = [];//技能 附加效果
    protected $skillField = [];//技能 领域
    protected $mood = 10;//  心情差 攻击力上升 命中下降  int 0~10  每层-10%命中 +5%伤害
    protected $injury = 0;//伤势  0-10  每层 全属性-10%
    protected $dps;//伤害
    protected $hit;//命中
    protected $dodge;//闪避
    protected $armor;//护甲
    protected $first;// 先攻
    protected $t; //体质   lifeValue = base + t*15 ;armor = base + t*0.6
    protected $m; //敏  dodge = base + m*0.5 ;hit = base + m*0.7;dps = base + m*0.3 ;first = base + m*0.1
    protected $l; //力量  dps = base + l*1; hit = base + l*0.1
    protected $z; //智力 dps = base + z*0.2 ;  hit = base + z*0.2 ; armor = base + z*0.2 ; first = base + z*0.2 ;
    protected $quality=[]; //体质
    protected $thing=[];// 物品列表 json
    protected $note;

    /**
     * @return mixed
     */
    public function getMaxLife()
    {
        return $this->maxLife;
    }

    /**
     * @param mixed $maxLife
     */
    public function setMaxLife($maxLife): void
    {
        $this->maxLife = $maxLife;
    }


    /**
     * @return mixed
     */
    public function getLife()
    {
        return $this->life;
    }

    /**
     * @param mixed $Life
     */
    public function setLife($Life): void
    {
        $this->life = $Life;
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
    public function getFirst()
    {
        return $this->first;
    }

    /**
     * @param mixed $first
     */
    public function setFirst($first): void
    {
        $this->first = $first;
    }




    /**
     * @return mixed
     */
    public function getLifeValue()
    {
        return $this->lifeValue;
    }

    /**
     * @param mixed $lifeValue
     */
    public function setLifeValue($lifeValue): void
    {
        $this->lifeValue = $lifeValue;
    }

    /**
     * @return mixed
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param mixed $level
     */
    public function setLevel($level): void
    {
        $this->level = $level;
    }

    /**
     * @return array
     */
    public function getSkill(): array
    {
        return $this->skill;
    }

    /**
     * @param array $skill
     */
    public function setSkill(array $skill): void
    {
        $this->skill = $skill;
    }

    /**
     * @return array
     */
    public function getSkillBuff(): array
    {
        return $this->skillBuff;
    }

    /**
     * @param array $skillBuff
     */
    public function setSkillBuff(array $skillBuff): void
    {
        $this->skillBuff = $skillBuff;
    }

    /**
     * @return array
     */
    public function getSkillField(): array
    {
        return $this->skillField;
    }

    /**
     * @param array $skillField
     */
    public function setSkillField(array $skillField): void
    {
        $this->skillField = $skillField;
    }

    /**
     * @return int
     */
    public function getMood(): int
    {
        return $this->mood;
    }

    /**
     * @param int $mood
     */
    public function setMood(int $mood): void
    {
        $this->mood = $mood;
    }

    /**
     * @return int
     */
    public function getInjury(): int
    {
        return $this->injury;
    }

    /**
     * @param int $injury
     */
    public function setInjury(int $injury): void
    {
        $this->injury = $injury;
    }

    /**
     * @return mixed
     */
    public function getDps()
    {
        return $this->dps;
    }

    /**
     * @param mixed $dps
     */
    public function setDps($dps): void
    {
        $this->dps = $dps;
    }

    /**
     * @return mixed
     */
    public function getHit()
    {
        return $this->hit;
    }

    /**
     * @param mixed $hit
     */
    public function setHit($hit): void
    {
        $this->hit = $hit;
    }

    /**
     * @return mixed
     */
    public function getDodge()
    {
        return $this->dodge;
    }

    /**
     * @param mixed $dodge
     */
    public function setDodge($dodge): void
    {
        $this->dodge = $dodge;
    }

    /**
     * @return mixed
     */
    public function getArmor()
    {
        return $this->armor;
    }

    /**
     * @param mixed $armor
     */
    public function setArmor($armor): void
    {
        $this->armor = $armor;
    }

    /**
     * @return mixed
     */
    public function getT()
    {
        return $this->t;
    }

    /**
     * @param mixed $t
     */
    public function setT($t): void
    {
        $this->t = $t;
    }

    /**
     * @return mixed
     */
    public function getM()
    {
        return $this->m;
    }

    /**
     * @param mixed $m
     */
    public function setM($m): void
    {
        $this->m = $m;
    }

    /**
     * @return mixed
     */
    public function getL()
    {
        return $this->l;
    }

    /**
     * @param mixed $l
     */
    public function setL($l): void
    {
        $this->l = $l;
    }

    /**
     * @return mixed
     */
    public function getZ()
    {
        return $this->z;
    }

    /**
     * @param mixed $z
     */
    public function setZ($z): void
    {
        $this->z = $z;
    }

    /**
     * @return array
     */
    public function getQuality(): array
    {
        return $this->quality;
    }

    /**
     * @param array $quality
     */
    public function setQuality(array $quality): void
    {
        $this->quality = $quality;
    }
}
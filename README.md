# myGame 文字挂机小游戏
## 安装
- 根目录下 composer  install
## 测试地址
[测试连接](http://iotdemo.zztdw.cn:9501/page/index.html)
账号123 密码123
## 生成器
- unit.php 单元测试
- unitBirthPlace.php 出生地地点生成器
- unitMonster.php 怪物生成器
- unitPlace.php 地点生成器
- unitPlayer.php  人物生成器
- unitQuality.php 体质生成器
- unitSkill.php 技能生成器
## 目录
- 后端
<pre>
App/
├── Bean #数据结构
│   ├── People
│   │   ├── BasicAttribute.php  #基础
│   │   ├── Birthplace.php #出生地
│   │   ├── BirthplaceEffect.php #出生地效果
│   │   ├── DropRule.php #怪物掉落规则
│   │   ├── Monster.php #npc
│   │   ├── Player.php #人
│   │   └── Quality.php #体质
│   ├── Region 
│   │   ├── Place.php #地点
│   │   └── Region.php #区域
│   └── Skill
│       ├── Attribute.php #效果
│       ├── Buff.php #buff
│       ├── BuffEffect.php #buff效果
│       ├── Lower.php #低级技能
│       ├── Middle.php #中级
│       ├── Satisfy.php #技能需求
│       ├── SkillEffect.php #技能效果
│       └── Super.php #高级技能
├── Data
│   ├── Player #用户测试数据存放路径 -- 已废弃
│   └── Sys #系统资源
│       ├── Birthplace #出生地
│       │   └── 沧海.json
│       ├── Monster #npc
│       │   ├── 乞丐.json
│       │   └── 武师.json
│       ├── Place #地点
│       │   └── 沧海.json
│       ├── PlayerInfo #用户升级具体新增属性规则
│       │   ├── levelUp.json
│       │   └── levelUpRule.json
│       ├── Quality #体质
│       │   └── 灵活.json
│       ├── Region #区域
│       │   └── 于州.json
│       └── Skill #技能列表
│           ├── 妙手空空.json
│           ├── 左钩拳.json
│           ├── 治疗.json
│           └── 疯狗拳.json
├── HttpController #模拟控制器
│   └── Index.php
├── Socket #服务类
│   └── Server.php
├── Tools #核心工具包
│   ├── Core.php #计算伤害得失工具类
│   ├── DataTools.php #系统资源获取
│   └── Generator.php #人物 生成器
└── UserMap
</pre>
- 前端
<pre>
Public/
├── gameLogin.html # 登入页面
├── page #核心页面
│   ├── index.html #我
│   └── map.html # 地图
├── res
│   ├── css
│   │   ├── common.css
│   │   └── loginPage.css
│   ├── img
│   │   ├── adm.png
│   │   ├── avtar.gif
│   │   ├── close.png
│   │   ├── key.png
│   │   ├── loginBg.jpg
│   │   └── pass.png
│   └── js
│       ├── common.js
│       ├── jquery.min.js
│       ├── msg.js
│       └── wsHelp.js
└── youxi.html #最初测试类
</pre>

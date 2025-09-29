<?php


class Personnage
{

    protected string $name;
    protected int $strength;
    protected int $hp;
    protected int $stamina;


    public function __construct($name, $strength, $hp, $stamina)
    {
        $this->name = $name;
        $this->strength = $strength;
        $this->hp = $hp;
        $this->stamina = $stamina;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getStrength()
    {
        return $this->strength;
    }
    public function getHp()
    {
        return $this->hp;
    }
    public function getStamina()
    {
        return $this->stamina;
    }


    public function attack($target)
    {
        switch ($target) {
            case ($target->hp > 0):
                $damage = rand(1, $this->getStrength());
                $target->hp = -$damage;
                if ($target->hp <= 0) {
                    echo "La cible {$target->name} est morte sous les coups de {$this->name}\n";
                }
                break;

            case ($target->hp <= 0):

                echo "La cible {$target->name} est morte";
        }
    }
}


class Orc extends Personnage
{
    public function __construct($name)
    {
        parent::__construct(name: $name, strength: 18, hp: 40, stamina: 12);
    }
    public function Debug()
    {
        echo "\nJe m'appelle {$this->name}, je suis un Orc et mes stats sont :\nHP: {$this->hp}\nForce: {$this->strength}\nEndurance: {$this->stamina}\n";
    }
}
class Humain extends Personnage
{
    public function __construct($name)
    {
        parent::__construct(name: $name, strength: 12, hp: 25, stamina: 20);
    }
    public function Debug()
    {
        echo "\nJe m'appelle {$this->name}, je suis un Humain et mes stats sont :\nHP: {$this->hp}\nForce: {$this->strength}\nEndurance: {$this->stamina}\n";
    }
}


class Elfe extends Personnage
{
    public function __construct($name)
    {
        parent::__construct(name: $name, strength: 8, hp: 30, stamina: 25);
    }
    public function Debug()
    {
        echo "\nJe m'appelle {$this->name}, je suis un Elfe et mes stats sont :\nHP: {$this->hp}\nForce: {$this->strength}\nEndurance: {$this->stamina}\n";
    }
}




$humain = new Humain("Nicolas");
$orc = new Orc("Valentin");
$elfe = new Elfe("Jordan");

$humain->Debug();
$orc->Debug();
$elfe->Debug();


$elfe->attack($humain);
$humain->Debug();

<?php
require_once(__DIR__ . "/../races/Orc.php");
require_once(__DIR__ . "/../races/Humain.php");
require_once(__DIR__ . "/../races/Elfe.php");

abstract class Personnage
{

    protected string $name;
    protected int $strength;
    protected int $hp;
    protected int $stamina;


    public function __construct(string $name, int $strength, int $hp, int $stamina)
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

    public function isAlive()
    {
        return $this->hp > 0;
    }

    public function setDamage($damage)
    {
        $this->hp -= $damage;

        if ($this->hp < 0) {
            $this->hp = 0;
        }
    }

    abstract protected function spendStamina($damage);
    abstract protected function gainStamina();

    public function attack($target)
    {
        $damage = rand(1, $this->getStrength());

        if ($this->stamina < $damage) {
            echo "\n===========================================================\n";
            echo "\033[4;32m{$this->getName()}\033[0;0m \033[34mn'as plus d'endurance! Il ne peut pas attaquer mais reprends son souffle!\033[0m";
            $this->gainStamina();
            return;
        }

        $target->setDamage($damage);

        $this->spendStamina($damage);
        echo "\n================= Combat \033[1;32m{$this->getName()}\033[0;0m \033[1;31mvs\033[0;0m \033[1;32m{$target->getName()}\033[0;0m =================\n\n";
        echo "\033[4;32m{$this->getName()}\033[0;0m attaque \033[4;32m{$target->getName()}\033[0;0m et inflige \033[1;5;31m{$damage} dégâts!\033[0m\n";
        echo "Il reste {$this->getStamina()} d'endurance à {$this->getName()}\n";
        echo "{$target->getName()} a {$target->getHp()} HP\n\n";


        if (!$target->isAlive()) {
            echo "\n===========================================================\n";
            echo "\033[4;32m{$target->getName()}\033[0;31m s'est fait éviscéré par \033[4;32m{$this->getName()}\033[0m\n";
            echo "===========================================================\n";
        }
    }
}

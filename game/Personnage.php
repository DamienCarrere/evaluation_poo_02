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
    public function finishHim($p1, $p2)
    {
        $string = [
            "\033[4;32m$p1\033[0;31m a ouvert le ventre de \033[4;32m$p2\033[0;31m et a joué avec ses entrailles.\033[0;0m\n",
            "\033[4;32m$p1\033[0;31m a arraché la mâchoire de \033[4;32m$p2\033[0;31m et l'a forcé à l'avaler.\033[0;0m\n",
            "\033[4;32m$p1\033[0;31m a écrasé la tête de \033[4;32m$p2\033[0;31m jusqu'à ce que les yeux jaillissent.\033[0;0m\n",
            "\033[4;32m$p1\033[0;31m a déchiré le torse de \033[4;32m$p2\033[0;31m pour lui arracher les poumons.\033[0;0m\n",
            "\033[4;32m$p1\033[0;31m a empalé \033[4;32m$p2\033[0;31m et l'a soulevé en laissant couler ses viscères.\033[0;0m\n",
            "\033[4;32m$p1\033[0;31m a arraché les bras de \033[4;32m$p2\033[0;31m et les a utilisés comme massues.\033[0;0m\n",
            "\033[4;32m$p1\033[0;31m a broyé la cage thoracique de \033[4;32m$p2\033[0;31m, éclaboussant le sol de sang.\033[0;0m\n",
            "\033[4;32m$p1\033[0;31m a explosé le crâne de \033[4;32m$p2\033[0;31m d'un coup, répandant des morceaux partout.\033[0;0m\n",
            "\033[4;32m$p1\033[0;31m a scalpé \033[4;32m$p2\033[0;31m et s'est coiffé avec sa peau.\033[0;0m\n",
            "\033[4;32m$p1\033[0;31m a éventré \033[4;32m$p2\033[0;31m et s'est emparé de son foie encore chaud.\033[0;0m\n",
            "\033[4;32m$p1\033[0;31m a arraché la colonne vertébrale de \033[4;32m$p2\033[0;31m avec les dents\033[0;0m\n",
        ];
        return $string[array_rand($string)];
    }

    public function setDamage($damage, $crit)
    {
        switch ($crit) {
            case true:
                $this->criticalStrike($damage);
                break;
            default:
                $this->hp -= $damage;

                if ($this->hp < 0) {
                    $this->hp = 0;
                }
                break;
        }
    }

    abstract protected function spendStamina($damage);
    abstract protected function gainStamina();
    abstract protected function criticalRoll();
    abstract protected function criticalStrike($damage);

    public function attack($target)
    {
        $damage = rand(1, $this->getStrength());
        $crit = $this->criticalRoll();

        if ($this->stamina < $damage) {
            echo "\n===========================================================\n";
            echo "\033[4;32m{$this->getName()}\033[0;0m \033[34mn'as plus d'endurance! Il ne peut pas attaquer mais reprends son souffle!\033[0m";
            $this->gainStamina();
            return;
        }

        $target->setDamage($damage, $crit);

        $this->spendStamina($damage);
        echo "\n================= ⚔️Combat \033[1;32m{$this->getName()}\033[0;0m \033[1;31mvs\033[0;0m \033[1;32m{$target->getName()}\033[0;0m ⚔️=================\n\n";
        switch ($crit) {
            case true:
                echo "\033[4;32m{$this->getName()}\033[0;0m défonce le crâne de \033[4;32m{$target->getName()}\033[0;0m et inflige \033[1;5;31m💥 {$damage} dégâts critiques!\033[0m 💥\n";
                break;
            default:
                echo "\033[4;32m{$this->getName()}\033[0;0m attaque \033[4;32m{$target->getName()}\033[0;0m et inflige \033[1;31m{$damage} dégâts!\033[0m\n";
                break;
        }
        echo "Il reste {$this->getStamina()} d'endurance à {$this->getName()}\n";
        echo "{$target->getName()} a {$target->getHp()} HP\n\n";




        if (!$target->isAlive()) {
            echo "\n===========================================================\n";
            switch ($crit) {
                case true:
                    echo $this->finishHim($this->getName(), $target->getName());
                    break;
                default:
                    echo "\033[4;32m{$this->getName()}\033[0;31m à décapité \033[4;32m{$target->getName()}\033[0;31m d'un coup sec\033[0;0m\n";
            }
            echo "===========================================================\n";
        }
    }
}

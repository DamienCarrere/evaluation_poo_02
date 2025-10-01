<?php

require_once(__DIR__ . "/../game/Personnage.php");

class Humain extends Personnage
{
    public function __construct($name)
    {
        parent::__construct(name: $name, strength: 18, hp: 50, stamina: 40);
    }

    protected function spendStamina($damage)
    {
        $this->stamina -= round($damage * 0.5);
        if ($this->stamina < 0) {
            $this->stamina = 0;
        }
    }
    protected function gainStamina()
    {
        $this->stamina += rand(2, 10);
    }
    protected function criticalRoll()
    {
        $criticalRoll = false;
        $roll = rand(1, 100);
        if ($roll >= 70) {
            $criticalRoll = true;
        }
        return $criticalRoll;
    }

    protected function criticalStrike($damage)
    {
        $this->hp -= round($damage * 2.2);

        if ($this->hp < 0) {
            $this->hp = 0;
        }
    }
}

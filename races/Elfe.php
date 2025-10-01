<?php

require_once(__DIR__ . "/../game/Personnage.php");

class Elfe extends Personnage
{
    public function __construct($name)
    {
        parent::__construct(name: $name, strength: 17, hp: 45, stamina: 60);
    }
    protected function spendStamina($damage)
    {
        $this->stamina -= round($damage * 0.4);
        if ($this->stamina < 0) {
            $this->stamina = 0;
        }
    }
    protected function gainStamina()
    {
        $this->stamina += rand(3, 14);
    }

    protected function criticalRoll()
    {
        $criticalRoll = false;
        $roll = rand(1, 100);
        if ($roll >= 60) {
            $criticalRoll = true;
        }
        return $criticalRoll;
    }
    protected function criticalStrike($damage)
    {
        $this->hp -= round($damage * 2);

        if ($this->hp < 0) {
            $this->hp = 0;
        }
    }
}

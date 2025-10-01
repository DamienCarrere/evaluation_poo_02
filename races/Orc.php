<?php

require_once(__DIR__ . "/../game/Personnage.php");

class Orc extends Personnage
{
    public function __construct($name)
    {
        parent::__construct(name: $name, strength: 22, hp: 60, stamina: 25);
    }

    protected function spendStamina($damage)
    {
        $this->stamina -= round($damage * 0.6);
        if ($this->stamina < 0) {
            $this->stamina = 0;
        }
    }
    protected function gainStamina()
    {
        $this->stamina += rand(1, 6);
    }
    protected function criticalRoll()
    {
        $criticalRoll = false;
        $roll = rand(1, 100);
        if ($roll >= 80) {
            $criticalRoll = true;
        }
        return $criticalRoll;
    }
    protected function criticalStrike($damage)
    {
        $this->hp -= round($damage * 2.5);

        if ($this->hp < 0) {
            $this->hp = 0;
        }
    }
}

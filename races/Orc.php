<?php

require_once(__DIR__ . "/../game/Personnage.php");

class Orc extends Personnage
{
    public function __construct($name)
    {
        parent::__construct(name: $name, strength: 20, hp: 120, stamina: 50);
    }

    protected function spendStamina($damage)
    {
        $this->stamina -= round($damage * 0.6);
        if ($this->stamina < 0) {
            $this->stamina = 0;
        }
    }
}

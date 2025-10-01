<?php

require_once(__DIR__ . "/../game/Personnage.php");

class Elfe extends Personnage
{
    public function __construct($name)
    {
        parent::__construct(name: $name, strength: 12, hp: 90, stamina: 80);
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
}

<?php

require_once(__DIR__ . "/../game/Personnage.php");

class Humain extends Personnage
{
    public function __construct($name)
    {
        parent::__construct(name: $name, strength: 15, hp: 100, stamina: 60);
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
}

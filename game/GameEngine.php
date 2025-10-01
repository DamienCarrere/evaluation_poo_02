<?php



class GameEngine
{

    protected array $domeDuTonnerre = [];


    public function addFighters(Personnage $p)
    {
        $this->domeDuTonnerre[] = $p;
    }

    public function getPlayer($playerArray)
    {
        return $playerArray;
    }

    public function getId($player)
    {
        return array_rand($player);
    }

    public function cleanDead()
    {
        $this->domeDuTonnerre = array_values(array_filter($this->domeDuTonnerre, fn($f) => $f->isAlive()));
    }
    public function onTurn()
    {

        if (count($this->domeDuTonnerre) < 2) {
            return;
        }

        $currentFighters = $this->domeDuTonnerre;
        shuffle($currentFighters);

        foreach ($currentFighters as $fighter) {
            if (!$fighter->isAlive()) {

                continue;
            }
            $this->cleanDead();
            $targets = array_filter($this->domeDuTonnerre, fn($f) => $f !== $fighter->isAlive() && $f !== $fighter);

            if (empty($targets)) {

                break;
            }
            $newDef = $targets[self::getId($targets)];
            $fighter->attack($newDef);
        }

        $this->cleanDead();
    }

    public function start()
    {
        while (!$this->end()) {
            $this->onTurn();
        }
        $winner = $this->domeDuTonnerre[0];
        echo "\n\n*********************************************************\n\033[1;3;4;5;32m{$winner->getName()} à massacré tout le monde et remporte le combat!\033[0m\n*********************************************************\n";
    }
    public function end()
    {
        return count($this->domeDuTonnerre) <= 1;
    }
}

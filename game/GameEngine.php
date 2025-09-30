<?php



class GameEngine
{

    protected array $fighters = [];


    public function addFighters(Personnage $p)
    {
        $this->fighters[] = $p;
    }

    public function cleanDead()
    {
        $this->fighters = array_values(array_filter($this->fighters, fn($f) => $f->isAlive()));
    }
    public function onTurn()
    {

        if (count($this->fighters) < 2) {
            return;
        }

        $currentFighters = $this->fighters;

        foreach ($currentFighters as $fighter) {
            if (!$fighter->isAlive()) {

                continue;
            }
            $this->cleanDead();
            $targets = array_filter($this->fighters, fn($f) => $f !== $fighter->isAlive() && $f !== $fighter);

            if (empty($targets)) {

                break;
            }
            $newDef = $targets[array_rand($targets)];
            $fighter->attack($newDef);
        }

        $this->cleanDead();
    }

    public function start()
    {
        while (!$this->end()) {
            $this->onTurn();
        }
        $winner = $this->fighters[0];
        echo "\n\n*********************************************************\n\033[1;32m{$winner->getName()} à massacré tout le monde et remporte le combat!\033[0m\n*********************************************************\n";
    }
    public function end()
    {
        return count($this->fighters) <= 1;
    }
}

<?php



class GameEngine
{
    protected int $id;
    protected array $fighters = [];


    public function addFighters(Personnage $p)
    {
        $this->fighters[] = $p;
    }


    public function getId()
    {
        return $this->id;
    }

    public function getPlayer()
    {
        return $this->fighters[array_rand($this->fighters)];
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

            $targets = array_filter($this->fighters, fn($f) => $f !== $fighter->isAlive() && $f !== $fighter);

            if (empty($targets)) {

                break;
            }
            $newDef = $targets[array_rand($targets)];
            $fighter->attack($newDef);
        }

        $this->cleanDead();
    }

    public function makeRandomRoles()
    {
        [$a, $b] = array_rand($this->fighters, 2);
        return [$this->fighters[$a], $this->fighters[$b]];
    }
    public function start()
    {
        while (!$this->end()) {
            $this->onTurn();
        }
        $winner = $this->fighters[0];
        echo "\033[32m{$winner->getName()} remporte le combat!\033[0m\n";
    }
    public function end()
    {
        return count($this->fighters) <= 1;
    }
}

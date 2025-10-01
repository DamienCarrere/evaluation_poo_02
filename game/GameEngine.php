<?php



class GameEngine
{

    protected array $domeDuTonnerre = [];


    public function addFighters(Personnage ...$p)
    {
        $this->domeDuTonnerre = array_merge($this->domeDuTonnerre, $p);
    }


    public function getId(): int
    {
        return array_rand($this->domeDuTonnerre);
    }
    public function getFighter(): Personnage
    {
        return $this->domeDuTonnerre[$this->getId()];
    }

    public function cleanDead()
    {
        $this->domeDuTonnerre = array_values(array_filter($this->domeDuTonnerre, fn($f) => $f->isAlive()));
    }
    public function onTurn()
    {



        $a = $this->getFighter();
        $b = $this->getFighter();

        while ($a == $b) {
            $b = $this->getFighter();
        }

        $a->attack($b);
        $this->cleanDead();
    }

    public function start()
    {
        while (!$this->end()) {
            $this->onTurn();
        }

        if (count($this->domeDuTonnerre) === 1) {
            $winner = $this->getFighter();
            echo "\n\n*********************************************************\n\n\033[5;33m .-=========-.\n \'-=======-'/\n _|   .=.   |_\n((|  {{1}}  |))\n \|   /|\   |/\n  \__ '`' __/\n    _`) (`_\n  _/_______\_\n _/_________\_    \033[1;3;4;5;32m{$winner->getName()} à massacré tout le monde et remporte le combat!\033[0m\n*********************************************************\n";
        }
    }
    public function end()
    {
        return count($this->domeDuTonnerre) <= 1;
    }
}

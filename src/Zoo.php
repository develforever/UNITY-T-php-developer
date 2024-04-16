<?php

namespace Robertjamroz\Zoo;

use Robertjamroz\Zoo\ImmutableAnimalAbstract;
use Robertjamroz\Zoo\Zoo\AnimalItems;
use Robertjamroz\Zoo\Zoo\MaxAnimalCountException;

class Zoo
{

    protected int $maxAnimalCount = 0;

    protected ?AnimalItems $animals = null;

    public function __construct()
    {
    }

    public function setMaxAnimalCount(int $max): self
    {
        $this->maxAnimalCount = $max;
        return $this;
    }

    public function add(ImmutableAnimalAbstract $animal): self
    {
        if (!$this->animals instanceof AnimalItems) {
            $this->animals = new AnimalItems([]);
        }

        if($this->animals->count()<$this->maxAnimalCount){
            $this->animals->append($animal);
        }else{
            throw new MaxAnimalCountException();
        }

        return $this;
    }
}

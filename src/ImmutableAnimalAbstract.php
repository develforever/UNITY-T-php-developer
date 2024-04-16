<?php

namespace Robertjamroz\Zoo;

use Robertjamroz\Zoo;

abstract class ImmutableAnimalAbstract extends Animal {

    public function setName(string $name): ImmutableAnimalAbstract
    {
        return $this;
    }

    public function setSpecies(Species $species): ImmutableAnimalAbstract
    {
        return $this;
    }
}
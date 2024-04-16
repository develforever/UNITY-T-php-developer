<?php

namespace Robertjamroz\Zoo\Animal;

use Robertjamroz\Zoo\AnimalType;
use Robertjamroz\Zoo\ImmutableAnimalAbstract;
use Robertjamroz\Zoo\Species;

abstract class ElephantAbstract extends ImmutableAnimalAbstract {
    protected ?Species $species = Species::Elephant;
    protected AnimalType $type = AnimalType::Herbivores;
}
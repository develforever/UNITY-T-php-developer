<?php

namespace Robertjamroz\Zoo\Animal;

use Robertjamroz\Zoo\AnimalType;
use Robertjamroz\Zoo\ImmutableAnimalAbstract;
use Robertjamroz\Zoo\Species;

abstract class FoxAbstract extends ImmutableAnimalAbstract {
    protected ?Species $species = Species::Fox;
    protected AnimalType $type = AnimalType::Carnivores;
    protected bool $has_fur = true;
}
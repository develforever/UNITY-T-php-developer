<?php

namespace Robertjamroz\Zoo\Animal;

use Robertjamroz\Zoo\AnimalType;
use Robertjamroz\Zoo\ImmutableAnimalAbstract;
use Robertjamroz\Zoo\Species;

abstract class TigerAbstract extends ImmutableAnimalAbstract {
    protected ?Species $species = Species::Tiger;
    protected AnimalType $type = AnimalType::Carnivores;
    protected bool $has_fur = true;
}
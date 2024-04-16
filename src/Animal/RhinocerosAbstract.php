<?php

namespace Robertjamroz\Zoo\Animal;

use Robertjamroz\Zoo\AnimalType;
use Robertjamroz\Zoo\ImmutableAnimalAbstract;
use Robertjamroz\Zoo\Species;

abstract class RhinocerosAbstract extends ImmutableAnimalAbstract {
    protected ?Species $species = Species::Rhinoceros;
    protected AnimalType $type = AnimalType::Herbivores;
    protected bool $has_fur = false;
}
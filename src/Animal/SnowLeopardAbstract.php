<?php

namespace Robertjamroz\Zoo\Animal;

use Robertjamroz\Zoo\ImmutableAnimalAbstract;
use Robertjamroz\Zoo\Species;

abstract class SnowLeopardAbstract extends ImmutableAnimalAbstract {
    protected ?Species $species = Species::SnowLeopard;
}
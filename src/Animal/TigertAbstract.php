<?php

namespace Robertjamroz\Zoo\Animal;

use Robertjamroz\Zoo\ImmutableAnimalAbstract;
use Robertjamroz\Zoo\Species;

abstract class TigerAbstract extends ImmutableAnimalAbstract {
    protected ?Species $species = Species::Tiger;
}
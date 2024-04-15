<?php

namespace Robertjamroz\Zoo;

const NONAME = 'noname';


class Animal {

    private ?Species $species = Species::Unknown;
    private ?string $name = null;
    private ?string $zoo_name = null;
    private AnimalType $type = AnimalType::Unknown;
    private ?int $lastFeed = null;

    private bool $has_fur = false;
    private ?int $lastBrushingFur = null;

    protected static $translator;

    public function __construct()
    {
        self::$translator = TranslationFactory::getFactory();
    }

    public function __toString()
    {
        $spieceI18n = self::$translator->translate($this->getSpecies()->value);
        return join(' ', [ucfirst($spieceI18n), $this->getName()]);
    }

    public function setName(string $name):self{
        $this->name = $name;
        return $this;
    }

    public function setSpecies(Species $species):self{
        $this->species = $species;
        return $this;
    }

    public function setZooName(string $name):self{
        $this->zoo_name = $name;
        return $this;
    }

    public function setType(FoodType $type):self{
        $this->type = $type;
        return $this;
    }
    public function getName():string{
        return ucwords($this->name?:NONAME);
    }

    public function getSpecies():Species{
        return $this->species?$this->species: Species::Unknown;
    }
    
    public function brushingFur():void {
        if($this->has_fur === true){
            $this->lastBrushingFur = time();
        }

    }

    public function feed(Food $food):void {

        if($this->type === AnimalType::Carnivores && $food->getType()->value !== FoodType::MeatFood){
            throw new FeedException();
        }

        if($this->type === AnimalType::Herbivores && $food->getType()->value !== FoodType::PlantFood){
            throw new FeedException();
        }

        $this->lastFeed = time();
    }
}

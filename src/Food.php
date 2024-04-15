<?php
namespace Robertjamroz\Zoo;

class Food {

    protected FoodType $type = FoodType::Unknown;
    private ?string $name = null;

    public function __construct(string $name, FoodType $type)
    {
        $this->name = $name;
        $this->type = $type;
    }

    public function getType():FoodType{
        return $this->type;
    }

}
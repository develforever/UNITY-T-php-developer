<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use Robertjamroz\Zoo\Animal;
use Robertjamroz\Zoo\Animal\Elephant\AfricanBush;
use Robertjamroz\Zoo\Animal\Fox;
use Robertjamroz\Zoo\Animal\Fox\CrabEating;
use Robertjamroz\Zoo\FeedException;
use Robertjamroz\Zoo\Food;
use Robertjamroz\Zoo\FoodType;
use Robertjamroz\Zoo\ImmutableAnimalAbstract;
use Robertjamroz\Zoo\Species;
use Robertjamroz\Zoo\TranslationFactory;

final class AnimalFeedTest extends TestCase
{
    public static function additionProvider(): array
    {
        return [
            [new CrabEating(), new Food('grass', FoodType::PlantFood)],
            [new AfricanBush(), new Food('crab', FoodType::MeatFood)],
        ];
    }

    #[DataProvider('additionProvider')]
    public function testAnimalFeed(ImmutableAnimalAbstract $animal, Food $food): void
    {
        $this->expectException(FeedException::class);
        $animal->feed($food);
    }
}

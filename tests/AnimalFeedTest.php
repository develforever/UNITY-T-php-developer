<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use Robertjamroz\Zoo\Animal;
use Robertjamroz\Zoo\Animal\Fox;
use Robertjamroz\Zoo\Food;
use Robertjamroz\Zoo\FoodType;
use Robertjamroz\Zoo\Species;
use Robertjamroz\Zoo\TranslationFactory;

final class AnimalFeedTest extends TestCase
{
    public static function additionProvider(): array
    {
        return [
            [new Fox(), new Food('meat', FoodType::MeatFood)],
            // [Species::Tiger, 'raja', 'Tygrys Raja'],
            // [Species::Elephant, 'horton', 'Słoń Horton'],
            // [Species::Rhinoceros, 'rhino', 'Nosorożec Rhino'],
            // [Species::SnowLeopard, 'tai lung', 'Irbis śnieżny Tai Lung'],
            // [Species::Rabbit, 'bugs', 'Królik Bugs'],
        ];
    }

    #[DataProvider('additionProvider')]
    public function testAnimalFeed(Animal $animal, Food $food): void
    {
        $animal->feed($food);
    }
}





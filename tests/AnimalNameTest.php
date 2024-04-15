<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use Robertjamroz\Zoo\Animal;
use Robertjamroz\Zoo\Species;
use Robertjamroz\Zoo\TranslationFactory;

final class AnimalNameTest extends TestCase
{
    public static function dataProvider(): array
    {
        return [
            [Species::Fox, 'tails', 'Lis Tails'],
            [Species::Tiger, 'raja', 'Tygrys Raja'],
            [Species::Elephant, 'horton', 'Słoń Horton'],
            [Species::Rhinoceros, 'rhino', 'Nosorożec Rhino'],
            [Species::SnowLeopard, 'tai lung', 'Irbis śnieżny Tai Lung'],
            [Species::Rabbit, 'bugs', 'Królik Bugs'],
        ];
    }

    #[DataProvider('dataProvider')]
    public function testAnimalToString(Species $species, string $name, string $expected): void
    {
        $translator = TranslationFactory::getFactory();

        $animal = new Animal();
        $animal->setSpecies($species)->setName($name);

        $this->assertTrue($animal.'' === $expected, $animal.' is not equal '.$expected);
    }
}





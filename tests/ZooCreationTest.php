<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use Robertjamroz\Zoo\Animal\Elephant\AfricanBush;
use Robertjamroz\Zoo\Animal\Elephant\AfricanForest;
use Robertjamroz\Zoo\Animal\Elephant\Asian;
use Robertjamroz\Zoo\Zoo;
use Robertjamroz\Zoo\Zoo\MaxAnimalCountException;

final class ZooCreationTest extends TestCase
{
    public static function additionProvider(): array
    {
        return [
           
        ];
    }

    // #[DataProvider('additionProvider')]
    public function testZooCreation(): void
    {

        $this->expectException(MaxAnimalCountException::class);
        $zoo = new Zoo();
        $zoo->setMaxAnimalCount(2)
        ->add(new AfricanForest())
        ->add(new AfricanBush())
        ->add(new Asian());
        
    }
}





<?php 
namespace Robertjamroz\Zoo;

enum AnimalType:string {
    case Unknown = 'unknown';
    case Carnivores = 'carnivores';
    case Herbivores = 'herbivores';
    case Omnivores = 'omnivores';
}
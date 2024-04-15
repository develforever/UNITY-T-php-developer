<?php 
namespace Robertjamroz\Zoo;

enum FoodType:string {
    case Unknown = 'unknown';
    case PlantFood = 'plant_food';
    case MeatFood = 'meat_food';
}
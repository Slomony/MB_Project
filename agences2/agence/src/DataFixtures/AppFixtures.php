<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\CityChoix;
use App\Entity\Property;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $em)
    {

        $cities=new CityChoix();

        $cities->setCities('Tunis 1');
        $em->persist($cities);
        $cities=new CityChoix();

        $cities->setCities('Tunis 2');
        $em->persist($cities);
        $cities=new CityChoix();

        $cities->setCities('Ariana');
        $em->persist($cities);
        $cities=new CityChoix();

        $cities->setCities('Manouba');
        $em->persist($cities);
        $cities=new CityChoix();

        $cities->setCities('Marsa');
        $em->persist($cities);
        $cities=new CityChoix();

        $cities->setCities('Ben Arous');
        $em->persist($cities);
        $cities=new CityChoix();

        $cities->setCities('Bizerte'); 
        $em->persist($cities);
        $cities=new CityChoix();

        $cities->setCities('Hamamet');
        $em->persist($cities);
        $property=new Property();
        $property->setTitle('Mon super bien')
        ->setSurface(150)
        ->setRooms(5)
        ->setBedrooms(2)
        ->setFloor(3)
        ->setPrice(217000)
        ->setHeat(0)
        ->setCity('Tunis')
        ->setAddress('cite khadra')
        ->setPostaleCode('1050TN02')
        ->setSold(false)
        ->setDescription('Bien très utile');
        $em->persist($property);

        $property=new Property();
        $property->setTitle('Mon très super bien')
        ->setSurface(150)
        ->setRooms(5)
        ->setBedrooms(2)
        ->setFloor(4)
        ->setPrice(350000)
        ->setHeat(0)
        ->setCity('Ariana')
        ->setAddress('Raouad')
        ->setPostaleCode('1050TN02')
        ->setSold(false)
        ->setDescription('Bien super très utile');
        $em->persist($property);

        $em->flush();
    }
}

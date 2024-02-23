<?php

namespace App\DataFixtures;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker ;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker= Faker\Factory::create("fr_FR");
        
        for ($i = 1; $i < 10; $i++) {
            $product[$i] = new Product();
            $product[$i]->setPrice($faker->randomFloat(2,5,1000));
            $product[$i]->setDescription($faker->sentence());
            $product[$i]->setUrlImage($faker->imageUrl());
            $manager->persist($product[$i]);
        }

        $manager->flush();
    }
}

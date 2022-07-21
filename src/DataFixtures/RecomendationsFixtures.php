<?php

namespace App\DataFixtures;

use App\Entity\Recomendations;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class RecomendationsFixtures extends Fixture implements DependentFixtureInterface
{
    public const RECOMENDATIONS = [
        [
            'activity' => 'Cork',
            'address' => 'Cork 92233',
            'date' => "12/02/2022",
            'image' => 'cork.jpg',
            'description' => 'Lorem abuda aikk Lorem abuda aikk Lorem abuda aikk'
        ],
        [
            'activity' => 'Dublin',
            'address' => 'Cork 92233',
            'date' => "12/02/2022",
            'image' => 'cork.jpg',
            'description' => 'Lorem abuda aikk Lorem abuda aikk Lorem abuda aikk'
        ],
        [
            'activity' => 'Galway',
            'address' => 'Cork 92233',
            'date' => "12/02/2022",
            'image' => 'cork.jpg',
            'description' => 'Lorem abuda aikk Lorem abuda aikk Lorem abuda aikk'

        ],
    ];
    public function load(ObjectManager $manager): void
    {
        foreach (self::RECOMENDATIONS as $recomendationsItems) {
            $recomendations = new recomendations();
            $recomendations->setActivity($recomendationsItems['activity']);
            $recomendations->setAddress($recomendationsItems['address']);
            $recomendations->setDate(new DateTime($recomendationsItems['date']));
            $recomendations->setImage($recomendationsItems['image']);
            $recomendations->setDescription($recomendationsItems['description']);
            $recomendations->setTravel($this->getReference('travel_Cork'));
            $manager->persist($recomendations);
            $this->addReference('recomendations_' . $recomendationsItems['activity'], $recomendations);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            TravelFixtures::class,
        ];
    }
}

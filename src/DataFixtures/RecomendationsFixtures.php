<?php

namespace App\DataFixtures;

use App\Entity\Recomendations;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RecomendationsFixtures extends Fixture
{
    public const RECOMENDATIONS = [
        [
            'activity' => 'Cork',
            'address' => 'Cork 92233',
            'date' => "12/02/2022",
            'image' => 'cork.jpg',
            'country' => 'Ireland',
            'description' => 'Lorem abuda aikk Lorem abuda aikk Lorem abuda aikk'
        ],
        [
            'activity' => 'Dublin',
            'address' => 'Cork 92233',
            'date' => "12/02/2022",
            'image' => 'cork.jpg',
            'country' => 'Ireland',
            'description' => 'Lorem abuda aikk Lorem abuda aikk Lorem abuda aikk'
        ],
        [
            'activity' => 'Galway',
            'address' => 'Cork 92233',
            'date' => "12/02/2022",
            'image' => 'cork.jpg',
            'country' => 'Ireland',
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
            $recomendations->setCountry($recomendationsItems['country']);
            $manager->persist($recomendations);
            $this->addReference('recomendations_' . $recomendationsItems['activity'], $recomendations);
        }

        $manager->flush();
    }
}

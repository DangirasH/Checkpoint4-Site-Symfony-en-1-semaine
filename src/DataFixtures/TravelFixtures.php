<?php

namespace App\DataFixtures;

use App\Entity\Travel;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TravelFixtures extends Fixture
{
    public const TRAVELS = [
        [
            'location' => 'Cork',
            'address' => 'Cork 92233',
            'date' => "12/02/2022",
            'image' => 'cork.jpg',
            'country' => 'Ireland'
        ],
        [
            'location' => 'Dublin',
            'address' => 'Cork 92233',
            'date' => "12/02/2022",
            'image' => 'cork.jpg',
            'country' => 'France'
        ],
        [
            'location' => 'Galway',
            'address' => 'Cork 92233',
            'date' => "12/02/2022",
            'image' => 'cork.jpg',
            'country' => 'Lithuania'
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::TRAVELS as $travelItems) {
            $travel = new Travel();
            $travel->setLocation($travelItems['location']);
            $travel->setAddress($travelItems['address']);
            $travel->setDate(new DateTime($travelItems['date']));
            $travel->setImage($travelItems['image']);
            $travel->setCountry($travelItems['country']);
            $manager->persist($travel);
            $this->addReference('travel_' . $travelItems['location'], $travel);
        }

        $manager->flush();
    }
}

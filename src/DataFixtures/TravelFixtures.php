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
            'date' => "10/02/2013",
            'image' => 'ireFlag.png',
            'country' => 'Ireland'
        ],
        [
            'location' => 'Nantes',
            'address' => '44000 Nantes',
            'date' => "12/03/2021",
            'image' => 'frFlag.png',
            'country' => 'France'
        ],
        [
            'location' => 'Siaulai',
            'address' => 'Šiauliai 76149',
            'date' => "12/09/2008",
            'image' => 'litFlag.png',
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

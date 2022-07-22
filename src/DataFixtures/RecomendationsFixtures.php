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
            'activity' => 'Shandon Bells & Tower St Annes Church',
            'address' => 'Church St, Shandon, Cork, Ireland',
            'date' => "12/02/2022",
            'image' => 'church.png',
            'description' => "Belle église avec des activités médiévales telles que des tests alimentaires sûrs, bien sûr, des tests d'armure et du théâtre"        ],
        [
            'activity' => 'The Lough',
            'address' => 'Cork Lough, The Lough, Cork, Ireland',
            'date' => "12/02/2022",
            'image' => 'lake.png',
            'description' => "Rien à dire de plus, beau lac pour un plongeon dans l'eau"
        ],
        [
            'activity' => 'Panda Asian Street Food',
            'address' => '132 Evergreen Rd, Turners Cross',
            'date' => "12/02/2022",
            'image' => 'panda.png',
            'description' => 'Aimez-vous la cuisine chinoise alors voici le meilleur en Irlande'

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

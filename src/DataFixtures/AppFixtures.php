<?php

namespace App\DataFixtures;

use App\Entity\Bateau;
use App\Entity\Equipage;
use App\Entity\Sauve;
use App\Entity\Sauvetage;
use App\Entity\Sauveteur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Persistence\ObjectManager;
use Faker\Provider\DateTime;
use function PHPUnit\Framework\never;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $bateau = new Bateau();
        $bateau->setNom("Titanic");
        $manager->persist($bateau);
        $manager->flush();

        $bateau2 = new Bateau();
        $bateau2->setNom("La marina");
        $manager->persist($bateau2);
        $manager->flush();

        $sauve = new Sauve();
        $sauve->setNom("george")
            ->setPrenom("Ali")
            ->setDescription("il est chaud");
        $manager->persist($sauve);
        $manager->flush();

        $equipage = new Equipage();
        $manager->persist($equipage);
        $manager->flush();

        $sauveteur = new Sauveteur();
        $sauveteur->setNom("martinez")
            ->setPrenom("Lautaro")
            ->setDescription("il est pas chaud")
            ->setEquipage($equipage);
        $manager->persist($sauveteur);
        $manager->flush();

       /* $sauvetage = new Sauvetage();
        $sauvetage->setEquipage($equipage)
            ->setBateau($bateau)
            ->setDateSauvetage(new \DateTime());
        $tab = new ArrayCollection();
        $tab[] = $sauve;
        $sauvetage->addSauve($tab);
        $manager->persist($sauvetage);
        $manager->flush();*/






    }
}

<?php

namespace Restaurant\RestaurantBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Restaurant\RestaurantBundle\Entity\Categories;

class CategoriesData extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $manager) {
        $categorie1 = new Categories();
        $categorie1->setNom('Confiserie');
        $categorie1->setImage($this->getReference('media1'));
        $categorie1->setImagerst($this->getReference('mediar1'));
        $manager->persist($categorie1);

        $categorie2 = new Categories();
        $categorie2->setNom('Cafe');
        $categorie2->setImage($this->getReference('media2'));
        $categorie2->setImagerst($this->getReference('mediar5'));
        $manager->persist($categorie2);

        $categorie3 = new Categories();
        $categorie3->setNom('Pizzaria');
        $categorie3->setImage($this->getReference('media3'));
        $categorie3->setImagerst($this->getReference('mediar3'));
        $manager->persist($categorie3);

        $manager->flush();

        $this->addReference('categorie1', $categorie1);
        $this->addReference('categorie2', $categorie2);
        $this->addReference('categorie3', $categorie3);
    }

    public function getOrder() {
        return 4;
    }

}

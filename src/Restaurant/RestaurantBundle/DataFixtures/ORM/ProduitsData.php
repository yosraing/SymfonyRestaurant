<?php

namespace Restaurant\RestaurantBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Restaurant\RestaurantBundle\Entity\Produits;

class ProduitsData extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $manager) {
        $produit1 = new Produits();
        $produit1->setCategorie($this->getReference('categorie1'));
        $produit1->setDescription("Une confiserie est un produit à base de sucre qui est vendu dans un magasin du même nom et fabriqué par un confiseur.");
        $produit1->setDisponible('1');
        $produit1->setImage($this->getReference('media1'));
        $produit1->setNom('cupcakes');
        $produit1->setPrix('1.99');
        $produit1->setTva($this->getReference('tva2'));
        $produit1->setRestaur($this->getReference('restaurs2'));
        $manager->persist($produit1);

        $produit2 = new Produits();
        $produit2->setCategorie($this->getReference('categorie1'));
        $produit2->setDescription("Une confiserie est un produit à base de sucre qui est vendu dans un magasin du même nom et fabriqué par un confiseur.");
        $produit2->setDisponible('1');
        $produit2->setImage($this->getReference('media4'));
        $produit2->setNom('sandwich ice cream');
        $produit2->setPrix('3.99');
        $produit2->setTva($this->getReference('tva2'));
        $produit2->setRestaur($this->getReference('restaurs2'));
        $manager->persist($produit2);

        $produit3 = new Produits();
        $produit3->setCategorie($this->getReference('categorie3'));
        $produit3->setDescription("La pizzeria est un restaurant spécialisé dans la vente ou le service de pizzas et autres spécialités italiennes.");
        $produit3->setDisponible('1');
        $produit3->setImage($this->getReference('media3'));
        $produit3->setNom('dinner is served');
        $produit3->setPrix('0.99');
        $produit3->setTva($this->getReference('tva2'));
        $produit3->setRestaur($this->getReference('restaurs5'));
        $manager->persist($produit3);

        $produit4 = new Produits();
        $produit4->setCategorie($this->getReference('categorie3'));
        $produit4->setDescription("La pizza reste toutefois son produit principal, les restaurants italiens servant plutôt des pâtes étant désignés du nom d'osteria.");
        $produit4->setDisponible('1');
        $produit4->setImage($this->getReference('media6'));
        $produit4->setNom('rustic party');
        $produit4->setPrix('2.99');
        $produit4->setTva($this->getReference('tva2'));
        $produit4->setRestaur($this->getReference('restaurs6'));
        $manager->persist($produit4);

        $produit5 = new Produits();
        $produit5->setCategorie($this->getReference('categorie2'));
        $produit5->setDescription("Le café (de l'arabe قهوة : qahwah, boisson stimulante) est une boisson énergisante psychotrope stimulante, obtenue à partir des graines torréfiées.");
        $produit5->setDisponible('1');
        $produit5->setImage($this->getReference('media5'));
        $produit5->setNom('caramel latte');
        $produit5->setPrix('0.97');
        $produit5->setTva($this->getReference('tva2'));
        $produit5->setRestaur($this->getReference('restaurs3'));
        $manager->persist($produit5);

        $produit6 = new Produits();
        $produit6->setCategorie($this->getReference('categorie2'));
        $produit6->setDescription("Le café est une boisson énergisante psychotrope stimulante, obtenue à partir des graines torréfiées de diverses variétés de caféier.");
        $produit6->setDisponible('1');
        $produit6->setImage($this->getReference('media2'));
        $produit6->setNom('coffee');
        $produit6->setPrix('1.20');
        $produit6->setTva($this->getReference('tva2'));
        $produit6->setRestaur($this->getReference('restaurs3'));
        $manager->persist($produit6);

        $manager->flush();
    }

    public function getOrder() {
        return 6;
    }

}

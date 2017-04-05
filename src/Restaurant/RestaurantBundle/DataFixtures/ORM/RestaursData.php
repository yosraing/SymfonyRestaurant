<?php

namespace Restaurant\RestaurantBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Restaurant\RestaurantBundle\Entity\Restaurs;

class RestaursData extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $manager) {
        $restaurs1 = new Restaurs();
        $restaurs1->setNom('Becha');
        $restaurs1->setAdresse('Route Touristique Dkhila، Monastir 5000, Tunisie');
        $restaurs1->setMail('becha@gmail.com');
        $restaurs1->setTel('73521088');
        $restaurs1->setPositionmaps('Latitude : 48.862725 | Longitude : 2.287592');
        $restaurs1->setDescription('petit resto ou l\'accueil est simple mais convivial.des bons produits servis avec goût et simplicité. le service est correct, les tarifs également');
        $restaurs1->setCategorie($this->getReference('categorie1'));
        $restaurs1->setImage($this->getReference('mediar1'));
        $manager->persist($restaurs1);

        $restaurs2 = new Restaurs();
        $restaurs2->setNom('Restos du Cœur');
        $restaurs2->setAdresse('Route omran Dkhila، sousse 2000, Tunisie');
        $restaurs2->setMail('cœur@gmail.com');
        $restaurs2->setTel('73000088');
        $restaurs2->setPositionmaps('Latitude : 48.862725 | Longitude : 2.287592');
        $restaurs2->setDescription('une vraie bonne Confiserie avec des produits de qualité et des nouveautés, l\'accueil est on ne peut plus sympa, la cuisine délicate; copieuse et inventive, une vraie confusion des sens. harmonie des goûts, ambiance intimiste');
        $restaurs2->setCategorie($this->getReference('categorie1'));
        $restaurs2->setImage($this->getReference('mediar4'));
        $manager->persist($restaurs2);

        $restaurs3 = new Restaurs();
        $restaurs3->setNom('Cafe');
        $restaurs3->setAdresse('Route sidi bousaid Dkhila، tunis 1000, Tunisie');
        $restaurs3->setMail('cafe@gmail.com');
        $restaurs3->setTel('73000154');
        $restaurs3->setPositionmaps('Latitude : 48.862725 | Longitude : 2.287592');
        $restaurs3->setDescription('Créer un lieu convivial, un café-restaurant où l\'on propose un seul menu le midi et des snacks maisons originaux le reste du temps.Mais pas seulement : des vides grenier, échanges de produits, savoirs et services locaux, tontines, concerts, lectures, conférences ...');
        $restaurs3->setCategorie($this->getReference('categorie2'));
        $restaurs3->setImage($this->getReference('mediar2'));
        $manager->persist($restaurs3);

        $restaurs4 = new Restaurs();
        $restaurs4->setNom('Restos Cafe');
        $restaurs4->setAdresse('Route Sousse ، Sousse 500, Tunisie');
        $restaurs4->setMail('restoscafe@gmail.com');
        $restaurs4->setTel('73000142');
        $restaurs4->setPositionmaps('Latitude : 48.862725 | Longitude : 2.287592');
        $restaurs4->setDescription('Un café-restaurant en coopérative. A notre connaissance ce type d\'établissement n\'existe pas dans la région de Fribourg (Sousse).');
        $restaurs4->setCategorie($this->getReference('categorie2'));
        $restaurs4->setImage($this->getReference('mediar5'));
        $manager->persist($restaurs4);

        $restaurs5 = new Restaurs();
        $restaurs5->setNom('Pizzati');
        $restaurs5->setAdresse('Route sidi hay lkhadhra، tunis 6000, Tunisie');
        $restaurs5->setMail('pizzati@gmail.com');
        $restaurs5->setTel('73000222');
        $restaurs5->setPositionmaps('Latitude : 48.862725 | Longitude : 2.287592');
        $restaurs5->setDescription('Ouverte depuis Janvier 2002 , le restaurant-pizzeria vous accueille tous les jours midi et soir dans un cadre chaleureux et autour de son four à bois pour déguster ses nombreuses spécialitées Italiennes et Siciliennes');
        $restaurs5->setCategorie($this->getReference('categorie3'));
        $restaurs5->setImage($this->getReference('mediar3'));
        $manager->persist($restaurs5);

        $restaurs6 = new Restaurs();
        $restaurs6->setNom('Restos Pizza');
        $restaurs6->setAdresse('Route lac2 ، tunic 5500, Tunisie');
        $restaurs6->setMail('restospizza@gmail.com');
        $restaurs6->setTel('73000333');
        $restaurs6->setPositionmaps('Latitude : 48.862725 | Longitude : 2.287592');
        $restaurs6->setDescription('La pizzeria dispose de 90 places assises en intérieur mais dispose également d\'une terrasse privée sur cour de 56 places pour vous permettre de profiter agréablement et au calme d\'un dîner à l\'ombre lors de la saison estivale.');
        $restaurs6->setCategorie($this->getReference('categorie3'));
        $restaurs6->setImage($this->getReference('mediar6'));
        $manager->persist($restaurs6);

        $manager->flush();

        $this->addReference('restaurs1', $restaurs1);
        $this->addReference('restaurs2', $restaurs2);
        $this->addReference('restaurs3', $restaurs3);
        $this->addReference('restaurs4', $restaurs4);
        $this->addReference('restaurs5', $restaurs5);
        $this->addReference('restaurs6', $restaurs6);
    }

    public function getOrder() {
        return 5;
    }

}

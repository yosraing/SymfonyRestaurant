<?php

namespace Restaurant\RestaurantBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Restaurant\RestaurantBundle\Entity\Media;

class MediaData extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $manager) {
        $media1 = new Media();
        $media1->setPath('http://hd.wallpaperswide.com/thumbs/almond_cherry_cupcakes-t2.jpg');
        $media1->setAlt('C_almond_cherry_cupcakes');
        $manager->persist($media1);

        $media2 = new Media();
        $media2->setPath('http://hd.wallpaperswide.com/thumbs/coffee_19-t2.jpg');
        $media2->setAlt('Ca_coffee');
        $manager->persist($media2);

        $media3 = new Media();
        $media3->setPath('http://hd.wallpaperswide.com/thumbs/dinner_is_served-t2.jpg');
        $media3->setAlt('P_dinner_is_served');
        $manager->persist($media3);

        $media4 = new Media();
        $media4->setPath('http://hd.wallpaperswide.com/thumbs/vanilla_sandwich_ice_cream-t2.jpg');
        $media4->setAlt('C_vanilla_sandwich_ice_cream');
        $manager->persist($media4);

        $media5 = new Media();
        $media5->setPath('http://hd.wallpaperswide.com/thumbs/caramel_latte-t2.jpg');
        $media5->setAlt('C_caramel_latte');
        $manager->persist($media5);

        $media6 = new Media();
        $media6->setPath('http://hd.wallpaperswide.com/thumbs/rustic_party-t1.jpg');
        $media6->setAlt('P_rustic_party');
        $manager->persist($media6);

        $media7 = new Media();
        $media7->setPath('http://hd.wallpaperswide.com/thumbs/slice_of_pizza-t1.jpg');
        $media7->setAlt('P_slice_of_pizza');
        $manager->persist($media7);

        $media8 = new Media();
        $media8->setPath('http://hd.wallpaperswide.com/thumbs/coffee_macro-t1.jpg');
        $media8->setAlt('C_coffee_macro');
        $manager->persist($media8);

        $manager->flush();

        $this->addReference('media1', $media1);
        $this->addReference('media2', $media2);
        $this->addReference('media3', $media3);
        $this->addReference('media4', $media4);
        $this->addReference('media5', $media5);
        $this->addReference('media6', $media6);
        $this->addReference('media7', $media7);
        $this->addReference('media8', $media8);
    }

    public function getOrder() {
        return 2;
    }

}

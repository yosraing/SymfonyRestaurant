<?php

namespace Restaurant\RestaurantBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Restaurant\RestaurantBundle\Entity\MediaRsT;

class MediaRSTData extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $manager) {
        $mediar1 = new MediaRST();
        $mediar1->setPath('https://images.pexels.com/photos/205961/pexels-photo-205961.jpeg');
        $mediar1->setAlt('C_pexels-photo');
        $manager->persist($mediar1);

        $mediar2 = new MediaRST();
        $mediar2->setPath('https://images.pexels.com/photos/34988/pexels-photo.jpg');
        $mediar2->setAlt('Ca_pexels-photo');
        $manager->persist($mediar2);

        $mediar3 = new MediaRST();
        $mediar3->setPath('https://images.pexels.com/photos/29346/pexels-photo-29346.jpg');
        $mediar3->setAlt('P_pexels-photo-29346');
        $manager->persist($mediar3);

        $mediar4 = new MediaRST();
        $mediar4->setPath('https://cdn.zuerich.com/sites/default/files/styles/gallery_image_l/public/web_zuerich_gastronomie_spruengli_02.jpg');
        $mediar4->setAlt('C_web_zuerich_gastronomie_spruengli_02');
        $manager->persist($mediar4);

        $mediar5 = new MediaRST();
        $mediar5->setPath('https://images.pexels.com/photos/32059/pexels-photo.jpg');
        $mediar5->setAlt('Ca_pexels-photo');
        $manager->persist($mediar5);

        $mediar6 = new MediaRST();
        $mediar6->setPath('https://images.pexels.com/photos/38106/pexels-photo-38106.jpeg');
        $mediar6->setAlt('P_pexels-photo-38106');
        $manager->persist($mediar6);

        $mediar7 = new MediaRST();
        $mediar7->setPath('https://images.pexels.com/photos/323910/pexels-photo-323910.jpeg');
        $mediar7->setAlt('P_pexels-photo-323910');
        $manager->persist($mediar7);

        $mediar8 = new MediaRST();
        $mediar8->setPath('https://images.pexels.com/photos/196852/pexels-photo-196852.jpeg');
        $mediar8->setAlt('Ca_pexels-photo-196852');
        $manager->persist($mediar8);

        $manager->flush();

        $this->addReference('mediar1', $mediar1);
        $this->addReference('mediar2', $mediar2);
        $this->addReference('mediar3', $mediar3);
        $this->addReference('mediar4', $mediar4);
        $this->addReference('mediar5', $mediar5);
        $this->addReference('mediar6', $mediar6);
        $this->addReference('mediar7', $mediar7);
        $this->addReference('mediar8', $mediar8);
    }

    public function getOrder() {
        return 3;
    }

}

<?php

namespace Utilisateurs\UtilisateursBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Utilisateurs\UtilisateursBundle\Entity\Utilisateurs;

class UtilisateursData extends AbstractFixture implements FixtureInterface, ContainerAwareInterface, OrderedFixtureInterface {

    private $container;

    public function setContainer(ContainerInterface $container = null) {
        $this->container = $container;
    }

    public function load(ObjectManager $manager) {
        $utilisateur1 = new Utilisateurs();
        $utilisateur1->setUsername('xxx');
        $utilisateur1->setEmail('xx@gmail.com');
        $utilisateur1->setEnabled(1);
        $utilisateur1->setPassword($this->container->get('security.encoder_factory')->getEncoder($utilisateur1)->encodePassword('xxx', $utilisateur1->getSalt()));
        $manager->persist($utilisateur1);

        $utilisateur2 = new Utilisateurs();
        $utilisateur2->setUsername('yyy');
        $utilisateur2->setEmail('yyy@gmail.com');
        $utilisateur2->setEnabled(1);
        $utilisateur2->setPassword($this->container->get('security.encoder_factory')->getEncoder($utilisateur2)->encodePassword('yyy', $utilisateur2->getSalt()));
        $manager->persist($utilisateur2);

        $manager->flush();

        $this->addReference('utilisateur1', $utilisateur1);
        $this->addReference('utilisateur2', $utilisateur2);
    }

    public function getOrder() {
        return 7;
    }

}

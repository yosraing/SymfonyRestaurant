<?php

namespace Utilisateurs\UtilisateursBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="utilisateurs")
 */
class Utilisateurs extends BaseUser
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
        $this->commandes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->reservation = new \Doctrine\Common\Collections\ArrayCollection();

    }

    /**
     * @ORM\OneToMany(targetEntity="Restaurant\RestaurantBundle\Entity\Commandes", mappedBy="utilisateur", cascade={"remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $commandes;

    /**
     * @ORM\OneToMany(targetEntity="Restaurant\RestaurantBundle\Entity\UtilisateursReservation", mappedBy="utilisateur", cascade={"remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $reservation;


    /**
     * Add commande
     *
     * @param \Restaurant\RestaurantBundle\Entity\Commandes $commande
     *
     * @return Utilisateurs
     */
    public function addCommande(\Restaurant\RestaurantBundle\Entity\Commandes $commande)
    {
        $this->commandes[] = $commande;

        return $this;
    }

    /**
     * Remove commande
     *
     * @param \Restaurant\RestaurantBundle\Entity\Commandes $commande
     */
    public function removeCommande(\Restaurant\RestaurantBundle\Entity\Commandes $commande)
    {
        $this->commandes->removeElement($commande);
    }

    /**
     * Get commandes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommandes()
    {
        return $this->commandes;
    }

    /**
     * Add reservation
     *
     * @param \Restaurant\RestaurantBundle\Entity\UtilisateursReservation $reservation
     *
     * @return Utilisateurs
     */
    public function addReservation(\Restaurant\RestaurantBundle\Entity\UtilisateursReservation $reservation)
    {
        $this->reservation[] = $reservation;

        return $this;
    }

    /**
     * Remove reservation
     *
     * @param \Restaurant\RestaurantBundle\Entity\UtilisateursReservation $reservation
     */
    public function removeReservation(\Restaurant\RestaurantBundle\Entity\UtilisateursReservation $reservation)
    {
        $this->reservation->removeElement($reservation);
    }

    /**
     * Get reservation
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReservation()
    {
        return $this->reservation;
    }
}

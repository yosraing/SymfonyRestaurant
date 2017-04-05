<?php

namespace Restaurant\RestaurantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UtilisateursReservation
 *
 * @ORM\Table("utilisateursreservation")
 * @ORM\Entity(repositoryClass="Restaurant\RestaurantBundle\Repository\UtilisateursReservationRepository")
 */
class UtilisateursReservation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @ORM\ManyToOne(targetEntity="Utilisateurs\UtilisateursBundle\Entity\Utilisateurs", inversedBy="reservation")
     * @ORM\JoinColumn(nullable=true)
     */
    private $utilisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=125)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=125)
     */
    private $prenom;

    /**
     * @var integer
     *
     * @ORM\Column(name="tel", type="integer")
     */
    private $tel;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heurereservation", type="time")
     */
    private $heurereservation;

    /**
     * @var string
     *
     * @ORM\Column(name="niveau", type="string", length=255)
     */
    private $niveau;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return UtilisateursReservation
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return UtilisateursReservation
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set tel
     *
     * @param integer $tel
     *
     * @return UtilisateursReservation
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return integer
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set heurereservation
     *
     * @param \DateTime $heurereservation
     *
     * @return UtilisateursReservation
     */
    public function setHeurereservation($heurereservation)
    {
        $this->heurereservation = $heurereservation;

        return $this;
    }

    /**
     * Get heurereservation
     *
     * @return \DateTime
     */
    public function getHeurereservation()
    {
        return $this->heurereservation;
    }

    /**
     * Set niveau
     *
     * @param string $niveau
     *
     * @return UtilisateursReservation
     */
    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;

        return $this;
    }

    /**
     * Get niveau
     *
     * @return string
     */
    public function getNiveau()
    {
        return $this->niveau;
    }

    /**
     * Set utilisateur
     *
     * @param \Utilisateurs\UtilisateursBundle\Entity\Utilisateurs $utilisateur
     *
     * @return UtilisateursReservation
     */
    public function setUtilisateur(\Utilisateurs\UtilisateursBundle\Entity\Utilisateurs $utilisateur = null)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * Get utilisateur
     *
     * @return \Utilisateurs\UtilisateursBundle\Entity\Utilisateurs
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }
}

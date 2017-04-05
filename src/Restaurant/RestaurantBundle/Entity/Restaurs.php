<?php

namespace Restaurant\RestaurantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Restaurs
 *
 * @ORM\Table("restaurs")
 * @ORM\Entity(repositoryClass="Restaurant\RestaurantBundle\Repository\RestaursRepository")
 */
class Restaurs {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="Restaurant\RestaurantBundle\Entity\Produits", mappedBy="restaur", cascade={"remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $produit;

    /**
     * @ORM\OneToOne(targetEntity="Restaurant\RestaurantBundle\Entity\MediaRSt", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $image;

    /**
     * @ORM\ManyToOne(targetEntity="Restaurant\RestaurantBundle\Entity\Categories", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $categorie;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=125)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=125)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=125)
     */
    private $mail;

    /**
     * @var integer
     *
     * @ORM\Column(name="tel", type="integer")
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="positionmaps", type="string", length=125)
     */
    private $positionmaps;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Restaurs
     */
    public function setNom($nom) {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom() {
        return $this->nom;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Restaurs
     */
    public function setAdresse($adresse) {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse() {
        return $this->adresse;
    }

    /**
     * Set mail
     *
     * @param string $mail
     *
     * @return Restaurs
     */
    public function setMail($mail) {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail() {
        return $this->mail;
    }

    /**
     * Set tel
     *
     * @param integer $tel
     *
     * @return Restaurs
     */
    public function setTel($tel) {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return integer
     */
    public function getTel() {
        return $this->tel;
    }

    /**
     * Set positionmaps
     *
     * @param string $positionmaps
     *
     * @return Restaurs
     */
    public function setPositionmaps($positionmaps) {
        $this->positionmaps = $positionmaps;

        return $this;
    }

    /**
     * Get positionmaps
     *
     * @return string
     */
    public function getPositionmaps() {
        return $this->positionmaps;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Restaurs
     */
    public function setDescription($description) {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->produit = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add produit
     *
     * @param \Restaurant\RestaurantBundle\Entity\Produits $produit
     *
     * @return Restaurs
     */
    public function addProduit(\Restaurant\RestaurantBundle\Entity\Produits $produit)
    {
        $this->produit[] = $produit;

        return $this;
    }

    /**
     * Remove produit
     *
     * @param \Restaurant\RestaurantBundle\Entity\Produits $produit
     */
    public function removeProduit(\Restaurant\RestaurantBundle\Entity\Produits $produit)
    {
        $this->produit->removeElement($produit);
    }

    /**
     * Get produit
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProduit()
    {
        return $this->produit;
    }

    /**
     * Set image
     *
     * @param \Restaurant\RestaurantBundle\Entity\MediaRSt $image
     *
     * @return Restaurs
     */
    public function setImage(\Restaurant\RestaurantBundle\Entity\MediaRSt $image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \Restaurant\RestaurantBundle\Entity\MediaRSt
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set categorie
     *
     * @param \Restaurant\RestaurantBundle\Entity\Categories $categorie
     *
     * @return Restaurs
     */
    public function setCategorie(\Restaurant\RestaurantBundle\Entity\Categories $categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \Restaurant\RestaurantBundle\Entity\Categories
     */
    public function getCategorie()
    {
        return $this->categorie;
    }
}

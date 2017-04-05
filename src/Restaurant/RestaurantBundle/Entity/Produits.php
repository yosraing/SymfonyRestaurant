<?php

namespace Restaurant\RestaurantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produits
 *
 * @ORM\Table("produits")
 * @ORM\Entity(repositoryClass="Restaurant\RestaurantBundle\Repository\ProduitsRepository")
 */
class Produits {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Restaurant\RestaurantBundle\Entity\Restaurs", inversedBy="produit")
     * @ORM\JoinColumn(nullable=true)
     */
    private $restaur;

    /**
     * @ORM\OneToOne(targetEntity="Restaurant\RestaurantBundle\Entity\Media", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $image;

    /**
     * @ORM\ManyToOne(targetEntity="Restaurant\RestaurantBundle\Entity\Categories", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $categorie;

    /**
     * @ORM\ManyToOne(targetEntity="Restaurant\RestaurantBundle\Entity\Tva", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $tva;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=125)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float")
     */
    private $prix;

    /**
     * @var boolean
     *
     * @ORM\Column(name="disponible", type="boolean")
     */
    private $disponible;

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
     * @return Produits
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
     * Set description
     *
     * @param string $description
     *
     * @return Produits
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
     * Set prix
     *
     * @param float $prix
     *
     * @return Produits
     */
    public function setPrix($prix) {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return float
     */
    public function getPrix() {
        return $this->prix;
    }

    /**
     * Set disponible
     *
     * @param boolean $disponible
     *
     * @return Produits
     */
    public function setDisponible($disponible) {
        $this->disponible = $disponible;

        return $this;
    }

    /**
     * Get disponible
     *
     * @return boolean
     */
    public function getDisponible() {
        return $this->disponible;
    }


    /**
     * Set restaur
     *
     * @param \Restaurant\RestaurantBundle\Entity\Restaurs $restaur
     *
     * @return Produits
     */
    public function setRestaur(\Restaurant\RestaurantBundle\Entity\Restaurs $restaur = null)
    {
        $this->restaur = $restaur;

        return $this;
    }

    /**
     * Get restaur
     *
     * @return \Restaurant\RestaurantBundle\Entity\Restaurs
     */
    public function getRestaur()
    {
        return $this->restaur;
    }

    /**
     * Set image
     *
     * @param \Restaurant\RestaurantBundle\Entity\Media $image
     *
     * @return Produits
     */
    public function setImage(\Restaurant\RestaurantBundle\Entity\Media $image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \Restaurant\RestaurantBundle\Entity\Media
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
     * @return Produits
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

    /**
     * Set tva
     *
     * @param \Restaurant\RestaurantBundle\Entity\Tva $tva
     *
     * @return Produits
     */
    public function setTva(\Restaurant\RestaurantBundle\Entity\Tva $tva)
    {
        $this->tva = $tva;

        return $this;
    }

    /**
     * Get tva
     *
     * @return \Restaurant\RestaurantBundle\Entity\Tva
     */
    public function getTva()
    {
        return $this->tva;
    }
}

<?php

namespace Restaurant\RestaurantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categories
 *
 * @ORM\Table("categories")
 * @ORM\Entity(repositoryClass="Restaurant\RestaurantBundle\Repository\CategoriesRepository")
 */
class Categories {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="Restaurant\RestaurantBundle\Entity\MediaRSt", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $imagerst;

    /**
     * @ORM\OneToOne(targetEntity="Restaurant\RestaurantBundle\Entity\Media", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=125)
     */
    private $nom;

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
     * @return Categories
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
     * Set imagerst
     *
     * @param \Restaurant\RestaurantBundle\Entity\MediaRSt $imagerst
     *
     * @return Categories
     */
    public function setImagerst(\Restaurant\RestaurantBundle\Entity\MediaRSt $imagerst) {
        $this->imagerst = $imagerst;

        return $this;
    }

    /**
     * Get imagerst
     *
     * @return \Restaurant\RestaurantBundle\Entity\MediaRSt
     */
    public function getImagerst() {
        return $this->imagerst;
    }

    /**
     * Set image
     *
     * @param \Restaurant\RestaurantBundle\Entity\Media $image
     *
     * @return Categories
     */
    public function setImage(\Restaurant\RestaurantBundle\Entity\Media $image) {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \Restaurant\RestaurantBundle\Entity\Media
     */
    public function getImage() {
        return $this->image;
    }

}

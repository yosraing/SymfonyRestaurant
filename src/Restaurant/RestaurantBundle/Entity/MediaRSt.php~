<?php

namespace Restaurant\RestaurantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MediaRSt
 *
 * @ORM\Table("mediarst")
 * @ORM\Entity(repositoryClass="Restaurant\RestaurantBundle\Repository\MediaRStRepository")
 */
class MediaRSt {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=255)
     */
    private $path;

    /**
     * @var string
     *
     * @ORM\Column(name="alt", type="string", length=125)
     */
    private $alt;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set path
     *
     * @param string $path
     *
     * @return MediaRSt
     */
    public function setPath($path) {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath() {
        return $this->path;
    }

    /**
     * Set alt
     *
     * @param string $alt
     *
     * @return MediaRSt
     */
    public function setAlt($alt) {
        $this->alt = $alt;

        return $this;
    }

    /**
     * Get alt
     *
     * @return string
     */
    public function getAlt() {
        return $this->alt;
    }

}

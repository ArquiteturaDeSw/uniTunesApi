<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

#@ORM\DiscriminatorMap({"Book" = "Book", "Video" = "Video", "PodCast" = "PodCast", "Music" = "Music"})

/**
 * @ORM\Entity
 * @ORM\Table(name="Medias")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="discriminator", type="string")
 */
abstract class Media extends Entity
{
    /** @ORM\Column(type="string") */
    public $name;
    /** @ORM\Column(type="text") */
    public $description;
    
    //TODO: Remaining check how to do this relationship
    public $author;
    
    /** @ORM\Column(type="string") */
    public $imagePath;
    /** @ORM\Column(type="decimal", scale=2) */
    public $price;
    /** @ORM\Column(type="boolean") */
    public $isAvailable;
    /** @ORM\OneToOne(targetEntity="Category") */
    public $category;

    function __construct()
    {
        $this->author = new ArrayCollection(); //List<User>
    }
}

abstract class Audible extends Media
{
    //public TimeSpan Duration { get; set; }
    //TODO: Descobrir como é TimeSpan no PHP
}

/**
 * @ORM\Entity
 */
class Music extends Audible
{
}

/**
 * @ORM\Entity
 */
class PodCast extends Audible
{
    /** @ORM\Column(type="string") */
    public $urlFeed;
}

/**
 * @ORM\Entity
 */
class Video extends Audible
{
    /** @ORM\Column(type="string") */
    public $quality;
}

/**
 * @ORM\Entity
 */
class Book extends Media
{
    /** @ORM\Column(type="integer") */
    public $pages;
}

?>
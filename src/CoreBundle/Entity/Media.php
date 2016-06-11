<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

#@ORM\DiscriminatorMap({"Book" = "Book", "Video" = "Video", "PodCast" = "PodCast", "Music" = "Music"})

/**
 * @ORM\Entity
 * @ORM\Table(name="Medias")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="Discriminator", type="string")
 */
abstract class Media extends Entity
{
    /** @ORM\Column(type="string") */
    public $Name;
    /** @ORM\Column(type="text") */
    public $Description;
    public $Author;
    /** @ORM\Column(type="string") */
    public $ImagePath;
    /** @ORM\Column(type="decimal", scale=2) */
    public $Price;
    /** @ORM\Column(type="boolean") */
    public $IsAvailable;
    /** @Id @OneToOne(targetEntity="Category") */
    public $Category;

    function __construct()
    {
        $this->Author = new ArrayCollection(); //List<User>
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
    public $UrlFeed;
}

/**
 * @ORM\Entity
 */
class Video extends Audible
{
    /** @ORM\Column(type="string") */
    public $Quality;
}

/**
 * @ORM\Entity
 */
class Book extends Media
{
    /** @ORM\Column(type="int") */
    public $Pages;
}

?>
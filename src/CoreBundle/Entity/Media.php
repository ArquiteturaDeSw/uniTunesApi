<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="medias")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="discriminator", type="string")
 */
abstract class Media extends Entity
{
    /** @ORM\Column(type="string") */
    public $name;
    /** @ORM\Column(type="text") */
    public $description;
    /** @ORM\OneToOne(targetEntity="User") */
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

?>
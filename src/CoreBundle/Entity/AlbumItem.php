<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="albumItems")
 */
class AlbumItem extends Entity
{
    /** @ORM\OneToOne(targetEntity="Album") */
    public $album;

    /** @ORM\OneToOne(targetEntity="Media") */
    public $media;
}
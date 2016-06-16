<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="bookMarkLists")
 */
class BookMarkList extends Entity
{
    /** @ORM\Column(type="string") */
    public $name;

    /** @ORM\OneToOne(targetEntity="User") */
    public $owner;

    /** @ORM\OneToMany(targetEntity="BookMarkListItem", mappedBy="bookMarkList") */
    public $items;

    function __construct($name, $user)
    {
        $this->name = $name;
        $this->owner = $user;

        if ($this->items == null)
            $this->items = new ArrayCollection();
    }
}

?>
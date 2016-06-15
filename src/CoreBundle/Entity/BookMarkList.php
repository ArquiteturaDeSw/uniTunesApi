<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="BookMarkLists")
 */
class BookMarkList extends Entity
{
    /** @ORM\Column(type="string") */
    public $Name;
    public $Owner;
    public $Items;

    function __construct($name, $user)
    {
        $this->Name = name;
        $this->Owner = user;

        if ($this->Items == null)
            $this->Items = new ArrayCollection();
    }
}

?>
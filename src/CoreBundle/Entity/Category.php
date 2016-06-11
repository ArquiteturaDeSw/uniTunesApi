<?php

namespace CoreBundle\Entity;

/**
 * @ORM\Entity
 * @ORM\Table(name="Categories")
 */
class Category extends Entity
{
    /**
     * @ORM\Column(type="string")
     */
    public $Name;

    function __construct($name)
    {
        $this->Name = $name;
    }
}
?>
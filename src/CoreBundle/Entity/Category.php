<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Categories")
 */
class Category extends Entity
{
    /**
     * @ORM\Column(type="string")
     */
    public $name;

    function __construct($name)
    {
        $this->name = $name;
    }
}

?>
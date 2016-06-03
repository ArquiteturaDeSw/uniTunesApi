<?php

namespace CoreBundle\Entity;

class Category extends Entity
{
    public $Name;

    function __construct($name)
    {
        $this->Name = $name;
    }
}
?>
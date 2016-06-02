<?php

namespace CoreBundle\Entity;

class Category implements Entity
{
    public $Name;

    function __construct($name)
    {
        $this->Name = $name;
    }
}
?>
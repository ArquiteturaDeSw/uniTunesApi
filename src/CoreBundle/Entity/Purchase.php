<?php

namespace CoreBundle\Entity;

class Purchase implements Entity
{
    public $Buyer;
    public $Media;
    
    function __construct($buyer, $media){
        $this->Buyer = $buyer;
        $this->Media = $media;
    }
}
?>
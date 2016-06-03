<?php

namespace CoreBundle\Entity;

class Purchase extends Entity
{
    public $Buyer;
    public $Media;
    
    function __construct($buyer, $media){
        $this->Buyer = $buyer;
        $this->Media = $media;
    }
}
?>
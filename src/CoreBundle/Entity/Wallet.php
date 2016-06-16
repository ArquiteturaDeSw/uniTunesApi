<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="wallets")
 */
class Wallet extends Entity
{
    /** @ORM\OneToOne(targetEntity="User") */
    public $owner;
    
    /** @ORM\Column(type="decimal", scale=2) */
    public $currentValue;

    function __construct($user)
    {
        $this->owner = $user;
        $this->currentValue = 0;
    }

    function AddCredit($value)
    {
        $this->currentValue += $value;
    }
}

?>
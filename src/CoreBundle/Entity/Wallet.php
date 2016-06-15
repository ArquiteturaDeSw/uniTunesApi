<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Wallets")
 */
class Wallet extends Entity
{
    /** @ORM\OneToOne(targetEntity="User") */
    public $Owner;
    /** @ORM\Column(type="decimal", scale=2) */
    public $CurrentValue;

    function __construct($user)
    {
        $this->Owner = $user;
        $this->CurrentValue = 0;
    }

    function AddCredit($value)
    {
        $this->CurrentValue += $value;
    }
}

?>
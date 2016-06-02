<?php
    
    namespace CoreBundle\Entity;
    
    class Wallet implements Entity
    {
        public $Owner;
        public $CurrentValue;

        function __construct($user)
        {
            $this->Owner =$user;
            $this->CurrentValue = 0;
        }

        function AddCredit($value)
        {
            $this->CurrentValue += $value;
        }
    }
?>
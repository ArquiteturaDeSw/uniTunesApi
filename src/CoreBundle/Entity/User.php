<?php

namespace CoreBundle\Entity;

use LengthException;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Users")
 */
class User extends Entity
{
    /** @ORM\Column(type="string") */
    protected $Name;
    /** @ORM\Column(type="string") */
    protected $Email;
    /** @ORM\Column(type="string") */
    protected $Password;
    /** @ORM\Column(type="boolean") */
    protected $Status;
    /** @ORM\Column(type="string") */
    protected $RecoveryPasswordHash;
    /** @ORM\Column(type="boolean") */
    protected $IsAdministrator;
    /** @OneToMany(targetEntity="Purchase", mappedBy="Buyer") */
    protected $Purchases;

    function __construct($name, $email, $password)
    {
        parent::__construct();

        $this->Name = $name;
        $this->Email = $email;

        if (strlen($password) <= 6 || strlen($password) > 30)
            throw new LengthException("the password must be longer than 6 and shorter than 30 chars.");

        $this->Password = $password;

        $this->Activate();

        $this->Purchases = new ArrayCollection();
    }

    function Deactivate()
    {
        $this->Status = UserStatus::Deactivated;
    }

    function Activate()
    {
        $this->Status = UserStatus::Active;
    }

    function Block()
    {
        $this->Status = UserStatus::Blocked;
    }

    public function getId()
    {
        return $this->Id;
    }

    public function setName($name)
    {
        $this->Name = $name;
        return $this;
    }

    public function getName()
    {
        return $this->Name;
    }

    public function setEmail($email)
    {
        $this->Email = $email;
        return $this;
    }

    public function getEmail()
    {
        return $this->Email;
    }

    public function setPassword($password)
    {
        $this->Password = $password;
        return $this;
    }

    public function getPassword()
    {
        return $this->Password;
    }

    public function setStatus($status)
    {
        $this->Status = $status;
        return $this;
    }

    public function getStatus()
    {
        return $this->Status;
    }
}

abstract class UserStatus
{
    const PendingApproval = 1;
    const Active = 2;
    const Blocked = 3;
    const Deactivated = 4;
}

<?php

namespace CoreBundle\Entity;

class User extends Entity
{
    /** @Column(type="string") * */
    protected $Name;
    /** @Column(type="string") * */
    protected $Email;
    /** @Column(type="string") * */
    protected $Password;
    /** @Column(type="boolean") */
    protected $Status;
    /** @Column(type="string") * */
    protected $RecoveryPasswordHash;
    /** @Column(type="boolean") */
    protected $IsAdministrator;

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
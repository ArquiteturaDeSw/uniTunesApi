<?php

namespace CoreBundle\Entity;

class User
{
    private $Name;
    private $Email;
    private $Password;
    private $Status;
    private $RecoveryPasswordHash;
    private $IsAdministrator;
    private $Purchases;
    
    function __construct($name, $email, $password){
        $this->Name = $name;
        $this->Email = $email;
        
        if (password.Length <= 6 || password.Length > 30)
            throw new ArgumentException("the password must be longer than 6 and shorter than 30 chars.");
            
        $this->Password = $password;
        
        $this->Activate();
        
    }
    
    function Deactivate()
    {
        $this->Status = UserStatus.Deactivated;
    }

    function Activate()
    {
        $this->Status = UserStatus.Active;
    }

    function Block()
    {
        $this->Status = UserStatus.Blocked;
    }
        
    public function getId()
    {
        return $this->id;
    }
     
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }
}

abstract class UserStatus{
    const PendingAproval = 1;
    const Active = 2;
    const Blocked = 3;
    const Deactivated = 4;
}
<?php

namespace CoreBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface, \Serializable
{
    private $id;
    private $username;
    private $password;
    private $email;
    private $isActive;


    function __construct($name, $email, $password)
    {
        parent::__construct();

        $this->setName($name);
        $this->setEmail($email);

        if (strlen($password) <= 6 || strlen($password) > 30)
            throw new LengthException("the password must be longer than 6 and shorter than 30 chars.");

        $this->setPassword($password);

        $this->isActivate = TRUE;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getSalt()
    {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return null;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getRoles()
    {
        return array('ROLE_USER');
    }

    public function eraseCredentials()
    {
    }

    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
        ));
    }

    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
        ) = unserialize($serialized);
    }
}

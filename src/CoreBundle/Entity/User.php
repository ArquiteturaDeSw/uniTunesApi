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

        $this->setName($name);
        $this->setEmail($email);
        $this->setPassword($password);
        $this->isActive = TRUE;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setName($name) {
        $this->username = $name;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPassword($password) {
        $options = [
            'cost' => 12,
        ];
        $this->password = password_hash($password, PASSWORD_BCRYPT, $options);
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

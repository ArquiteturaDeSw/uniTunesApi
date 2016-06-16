<?php

namespace CoreBundle\Entity;

use LengthException;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User extends Entity implements UserInterface, \Serializable
{
    /** @ORM\Column(type="string") */
    protected $name;
    /** @ORM\Column(type="string") */
    protected $username; #USED TO STORE UNISINOS LOGIN NAME
    /** @ORM\Column(type="string") */
    protected $email;
    /** @ORM\Column(type="string") */
    protected $password;
    /** @ORM\Column(type="boolean") */
    protected $status;
    /** @ORM\Column(type="string") */
    protected $recoveryPasswordHash;
    /** @ORM\Column(type="boolean") */
    protected $isAdministrator;
    /** @ORM\OneToMany(targetEntity="Purchase", mappedBy="Buyer") */
    protected $purchases;

    function __construct($name, $email, $password)
    {
        parent::__construct();

        if (strlen($password) <= 6 || strlen($password) > 30)
            throw new LengthException("the password must be longer than 6 and shorter than 30 chars.");

        $this->setName($name);
        $this->setEmail($email);
        $this->setPassword($password);
        $this->activate();
        $this->purchases = new ArrayCollection();
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($password)
    {
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

    function deactivate()
    {
        $this->status = UserStatus::Deactivated;
    }

    function activate()
    {
        $this->status = UserStatus::Active;
    }

    function block()
    {
        $this->status = UserStatus::Blocked;
    }
}

abstract class UserStatus
{
    const PendingApproval = 1;
    const Active = 2;
    const Blocked = 3;
    const Deactivated = 4;
}

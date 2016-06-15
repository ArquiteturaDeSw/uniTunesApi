<?php

namespace CoreBundle\Entity;

use LengthException;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="Users")
 */
class User extends Entity implements UserInterface, \Serializable
{
    /** @ORM\Column(type="string") */
    protected $Name;
    /** @ORM\Column(type="string") */
    protected $UserName; #USED TO STORE UNISINOS LOGIN NAME
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
    /** @ORM\OneToMany(targetEntity="Purchase", mappedBy="Buyer") */
    protected $Purchases;

    function __construct($name, $email, $password)
    {
        parent::__construct();

        if (strlen($password) <= 6 || strlen($password) > 30)
            throw new LengthException("the password must be longer than 6 and shorter than 30 chars.");

        $this->setName($name);
        $this->setEmail($email);
        $this->setPassword($password);
        $this->Activate();
        $this->Purchases = new ArrayCollection();
    }

    public function getUsername()
    {
        return $this->UserName;
    }

    public function setName($name)
    {
        $this->Status = $name;
    }

    public function setEmail($email)
    {
        $this->Email = $email;
    }

    public function setPassword($password)
    {
        $options = [
            'cost' => 12,
        ];
        $this->Password = password_hash($password, PASSWORD_BCRYPT, $options);
    }

    public function getSalt()
    {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return null;
    }

    public function getPassword()
    {
        return $this->Password;
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
            $this->UserName,
            $this->Password,
        ));
    }

    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->UserName,
            $this->Password,
            ) = unserialize($serialized);
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
}

abstract class UserStatus
{
    const PendingApproval = 1;
    const Active = 2;
    const Blocked = 3;
    const Deactivated = 4;
}
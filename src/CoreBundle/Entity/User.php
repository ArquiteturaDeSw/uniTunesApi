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
    /** @ORM\OneToMany(targetEntity="Purchase", mappedBy="buyer") */
    protected $purchases;

    /**
     * Construção do objeto
     *
     * @param string $name     Nome do usuário
     * @param string $email    Email do usuário
     * @param string $password Senha do usuário sem criptografia
     * @access protected
     * @return null
     */
    function __construct($name, $email, $password)
    {
        parent::__construct();

        /**
         * @todo verificar isto
         * Eu entendo isso como uma regra de negócio e não deveria ter a validação neste ponto, mas sim na camada de serviço.
         */
        if (strlen($password) <= 6 || strlen($password) > 30)
            throw new LengthException("the password must be longer than 6 and shorter than 30 chars.");

        $this->setName($name);
        $this->setEmail($email);
        $this->setPassword($password);
        $this->activate();
        $this->purchases = new ArrayCollection();
    }

    /**
     * Obtém o login do usuário
     *
     * @access public
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Define o nome do usuário
     *
     * @param string $name Nome do usuário
     * @access public
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Obtém o nome do usuário
     *
     * @access public
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Define o email do usuário
     *
     * @param string $email Email do usuário
     * @access public
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Obtém o email do usuário
     *
     * @access public
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Define a senha do usuário, utilizando bcrypt para criptografar.
     *
     * @param string $password Senha plain text
     * @access public
     * @return $this
     */
    public function setPassword($password)
    {
        $options = [
            'cost' => 12,
        ];
        $this->password = password_hash($password, PASSWORD_BCRYPT, $options);

        return $this;
    }

    public function getSalt()
    {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return null;
    }

    /**
     * Obtém o status do usuário
     *
     * @access public
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
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

    public function deactivate()
    {
        $this->status = UserStatus::Deactivated;
    }

    public function activate()
    {
        $this->status = UserStatus::Active;
    }

    public function block()
    {
        $this->status = UserStatus::Blocked;
    }
}
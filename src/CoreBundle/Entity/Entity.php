<?php

namespace CoreBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @todo verificar
 * ME SOA ESTRANHO TER UMA CLASSE ABSTRATA SEM MÉTODOS ABSTRATOS
 * Temos como utilizar algum padrão de projeto para isto?
 */
abstract class Entity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     **/
    public $id;

    /** @ORM\Column(type="datetime") */
    public $creationDate;

    /** @ORM\Column(type="boolean") */
    public $deleted;

    /**
     * Contrução do objeto
     *
     * @access public
     * @return null
     */
    public function __construct()
    {
        date_default_timezone_set('UTC');

        $this->creationDate = new DateTime();

        $this->deleted = false;
    }

    /**
     * Obtém o identificador da entidade
     *
     * @access public
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Obtém a data de criação da entidade
     *
     * @access public
     * @return DateTime
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Verifica se a entidade está marcada como removida do sistema
     *
     * @access public
     * @return boolean
     */
    public function isDeleted()
    {
        return (boolean)$this->deleted;
    }
}


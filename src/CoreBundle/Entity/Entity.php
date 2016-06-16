<?php

namespace CoreBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

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

    function __construct()
    {
        date_default_timezone_set('UTC');

        $this->creationDate = new DateTime();
        //$this->CreationDate = new DateTime(); //TODO: verificar se isto retorna a mesma coisa que DateTime.Now

        $this->deleted = false;
    }
}

?>

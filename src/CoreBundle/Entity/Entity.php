<?php

namespace CoreBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

abstract class Entity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @GeneratedValue
     **/
    public $Id;

    /** @ORM\Column(type="datetime") */
    public $CreationDate;

    /** @ORM\Column(type="boolean") */
    public $Deleted;

    function __construct()
    {
        date_default_timezone_set('UTC');

        $this->CreationDate = new DateTime();
        //$this->CreationDate = new DateTime(); //TODO: verificar se isto retorna a mesma coisa que DateTime.Now

        $this->Deleted = false;
    }
}

?>

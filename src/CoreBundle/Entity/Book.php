<?php
/**
 * Created by PhpStorm.
 * User: thiago
 * Date: 16/06/2016
 * Time: 00:10
 */

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Book extends Media
{
    /** @ORM\Column(type="integer") */
    public $pages;
}
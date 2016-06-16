<?php
/**
 * Created by PhpStorm.
 * User: thiago
 * Date: 15/06/2016
 * Time: 22:24
 */

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="bookMarkListItems")
 */
class BookMarkListItem extends Entity
{
    /** @ORM\OneToOne(targetEntity="BookMarkList") */
    public $bookMarkList;

    /** @ORM\OneToOne(targetEntity="Media") */
    public $media;
}
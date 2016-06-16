<?php
/**
 * Created by PhpStorm.
 * User: thiago
 * Date: 16/06/2016
 * Time: 00:11
 */

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class PodCast extends Audible
{
    /** @ORM\Column(type="string") */
    public $urlFeed;
}

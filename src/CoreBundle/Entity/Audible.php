<?php
/**
 * Created by PhpStorm.
 * User: thiago
 * Date: 16/06/2016
 * Time: 00:11
 */

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

abstract class Audible extends Media
{
    //public TimeSpan Duration { get; set; } // : DateInterval
    
    /** @ORM\Column(type="string") */
    private $duration;
}

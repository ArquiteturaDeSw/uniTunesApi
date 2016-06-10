<?php
/**
 * Created by PhpStorm.
 * User: thiago
 * Date: 09/06/2016
 * Time: 16:12
 */

namespace CoreBundle\Application;
use Doctrine\ORM\EntityManager as EntityManagerInterface;

class AppServiceBase
{
    protected $databaseManager;

    function __construct(EntityManagerInterface $entityManager)
    {
        $this->databaseManager = $entityManager;
    }
}
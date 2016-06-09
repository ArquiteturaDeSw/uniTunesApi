<?php
/**
 * Created by PhpStorm.
 * User: thiago
 * Date: 09/06/2016
 * Time: 16:12
 */

namespace CoreBundle\Application;


class AppServiceBase
{
    protected $databaseManager;

    function __construct(EntityManager $entityManager)
    {
        $this->databaseManager = $entityManager;
    }
}
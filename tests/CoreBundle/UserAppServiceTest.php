<?php

/**
 * Created by PhpStorm.
 * User: thiago
 * Date: 09/06/2016
 * Time: 16:33
 */
require ("../../src/CoreBundle/Application/AppServiceBase.php");
require ("../../src/CoreBundle/Application/UserAppService.php");
require ("EntityManagerMock.php");

class UserAppServiceTest
{
    function CreateUser()
    {
        $ctx = new EntityManagerMock();
        $service = new \CoreBundle\Application\UserAppService($ctx);
    }
}
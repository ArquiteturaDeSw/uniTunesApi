<?php

namespace CoreBundle\Application;

use CoreBundle\Infra;
use CoreBundle\Entity\User;
use Doctrine\ORM\EntityManager;

class UserAppService
{
    private $databaseManager;

    function __construct(EntityManager $entityManager)
    {
        $this->databaseManager = $entityManager;
    }

    function Create($name, $email, $password)
    {
        $user = new User($name, $email, $password);
        $this->databaseManager->persist($user);
        $this->databaseManager->flush();
    }

    function GetById($id)
    {
        return $this->databaseManager->find('CoreBundle\Entity\User', $id);
    }

    function Edit($user)
    {
        $this->databaseManager->persist($user);
        $this->databaseManager->flush();
    }

    function Delete($user)
    {
        $user->databaseManager->remove($user);
        $this->databaseManager->flush();
    }
 }

?>

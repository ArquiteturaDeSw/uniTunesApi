<?php

namespace CoreBundle\Application;

use CoreBundle\Infra;
use CoreBundle\Entity\User;
use Doctrine\ORM\EntityManager;

class UserAppService extends AppServiceBase
{
    function Create($name, $email, $password)
    {
        $user = new User($name, $email, $password);
        $this->databaseManager->persist($user);
        $this->databaseManager->flush();
    }

    function GetById($id)
    {
        $repository = $this->databaseManager->getRepository('CoreBundle\Entity\User');
        
        $builder = $this->databaseManager->createQueryBuilder();
        $builder->select('user.name')
            ->from('CoreBundle\Entity\User', 'user')
            ->getQuery()->getArrayResult();
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

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

    function GetById($userId)
    {
        return $this->databaseManager->find('CoreBundle\Entity\User', $userId);
    }

    function Edit($userId, $name, $email)
    {
        $user = $this->databaseManager->find('CoreBundle\Entity\User', $userId);
        $this->databaseManager->persist($user);
        $this->databaseManager->flush();
    }

    function Delete($userId)
    {
        $user = $this->databaseManager->find('CoreBundle\Entity\User', $userId);
        $user->databaseManager->remove($user);
        $this->databaseManager->flush();
    }

    /*
     * Exemplo de repositorio

      $repository = $this->databaseManager->getRepository('CoreBundle\Entity\User');

        $builder = $this->databaseManager->createQueryBuilder();
        $builder->select('user.name')
            ->from('CoreBundle\Entity\User', 'user')
            ->getQuery()->getArrayResult();
        return $this->databaseManager->find('CoreBundle\Entity\User', $id);
     */
 }

?>

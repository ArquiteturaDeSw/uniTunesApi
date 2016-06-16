<?php

namespace CoreBundle\Application;

use CoreBundle\Infra;
use CoreBundle\Entity\User;
use Doctrine\ORM\EntityManager;

class UserAppService extends AppServiceBase
{
    public function create($name, $email, $password)
    {
        $user = new User($name, $email, $password);
        $this->databaseManager->persist($user);
        $this->databaseManager->flush();
    }

    public function getById($userId)
    {
        return $this->databaseManager->find('CoreBundle\Entity\User', $userId);
    }

    public function edit($userId, $name, $email)
    {
        $user = $this->databaseManager->find('CoreBundle\Entity\User', $userId);
        $this->databaseManager->persist($user);
        $this->databaseManager->flush();
    }

    public function delete($userId)
    {
        $user = $this->databaseManager->find('CoreBundle\Entity\User', $userId);
        $user->databaseManager->remove($user);
        $this->databaseManager->flush();
    }

    /**
     * Obtém a lista de usuários que não estão removidos ordenados pela data de
     * criação
     *
     * @todo verificar se existirá alguma filtragem no sistema
     *
     * @access public
     * @return array Lista de usuários
     */
    public function getAll()
    {
        $repository = $this->databaseManager->getRepository('CoreBundle\Entity\User');
        $builder = $repository->createQueryBuilder('u');
        $builder->where($builder->expr()->eq('u.deleted', 0))
            ->orderBy('u.creationDate');
        return $builder->getQuery()->getResult();

    }
}


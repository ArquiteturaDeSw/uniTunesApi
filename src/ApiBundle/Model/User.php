<?php

namespace ApiBundle\Model;

use JsonSerializable;
use CoreBundle\Entity\User as UserEntity;

/**
 * Camada para apresentação dos dados do Usuário de banco para a API
 */
class User implements JsonSerializable
{

    /**
     * Entidade de Usuário
     *
     * @var UserEntity
     * @access private
     */
    private $userEntity;

    /**
     * Construção do objeto
     *
     * @param UserEntity $entity Entidade de usuário
     * @access public
     * @return null
     */
    public function __construct(UserEntity $entity)
    {
        $this->userEntity = $entity;
    }

    /**
     * {@inheritDoc}
     */
    public function jsonSerialize()
    {
        $date = $this->userEntity->getCreationDate();
        return [
            'id' => $this->userEntity->getId(),
            'name' => $this->userEntity->getName(),
            'email' => $this->userEntity->getEmail(),
            'status' => $this->userEntity->getStatus(),
            'creation_date' => $date->format($date::ISO8601)
        ];
    }

}

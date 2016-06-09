<?php

namespace ApiBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CoreBundle\Application\UserAppService;
use CoreBundle\Entity\User;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class UsersController extends Controller
{
    public function GetAction()
    {
        // Get Service.
        $user_service = $this->get('core.user.service');

        // Example Loading by id.
        # $user = $user_service->GetById(1);

        // Example Editing a User.
        # $user->setName('Guilherme Lopes');
        # $user_service->Edit($user);

        return new Response('Hello World');
    }
}

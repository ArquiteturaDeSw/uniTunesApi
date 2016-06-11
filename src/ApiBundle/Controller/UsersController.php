<?php

namespace ApiBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CoreBundle\Application\UserAppService;
use CoreBundle\Entity\User;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class UsersController extends Controller
{
    public function GetAction()
    {
        // Get Service.
        $user_service = $this->get('core.user.service');

        $user = $this->get('security.token_storage')->getToken()->getUser();

        // If is not anonymous.
        if ($user instanceof UserInterface) {
            return new Response($user->getUsername());
        }

        return new Response('Hello World');
    }

    public function TestAction()
    {
        // Get Service.
        $service = $this->get('core.user.service');
        $service->create("Thiago", "sdf@asd.com", "1234");
        #return $this->json(array('username' => 'jane.doe'));
        return new JsonResponse(array('name' => 'thiago'));
    }
}

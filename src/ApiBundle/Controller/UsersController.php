<?php

namespace ApiBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CoreBundle\Application\UserAppService;
use CoreBundle\Entity\User;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpFoundation\JsonResponse;

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


        /*
         *  // returns '{"username":"jane.doe"}' and sets the proper Content-Type header
    return $this->json(array('username' => 'jane.doe'));
         */

        return new Response('Hello World');
    }

    public function TestAction()
    {
        $service = new UserAppService($this->get('doctrine.orm.default_entity_manager'));
        $service->Create("Thiago", "sdf@asd.com", "asdokasopdka");
        #return $this->json(array('username' => 'jane.doe'));
        return new JsonResponse(array('name' => 'thiago'));
    }
}

/*
 * EXEMPLO DE 404
 public function indexAction()
{
    // retrieve the object from database
    $product = ...;
    if (!$product) {
        throw $this->createNotFoundException('The product does not exist');
    }

    return $this->render(...);
}
 */
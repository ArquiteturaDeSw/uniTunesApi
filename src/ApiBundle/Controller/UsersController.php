<?php

namespace ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

use CoreBundle\Application\UserAppService;
use ApiBundle\Model\User;


/**
 * Controladora de usuários
 */
class UsersController extends Controller
{
    public function getAction()
    {
        // Get Service.
        $service = $this->get('core.user.service');

        $user = $this->get('security.token_storage')->getToken()->getUser();

        // If is not anonymous.
        if ($user instanceof UserInterface) {
            return new JsonResponse(new User($user));
        }

        return new JsonResponse('Hello World');
    }

    /**
     * Obtém a lista de usuários
     *
     * @access public
     * @return JsonResponse
     */
    public function getListAction()
    {
        $service = $this->get('core.user.service');
        $data = $service->getAll();
        $result = [];
        foreach ($data as $entity) {
            $result[] = new User($entity);
        }

        return new JsonResponse($result);
    }
}

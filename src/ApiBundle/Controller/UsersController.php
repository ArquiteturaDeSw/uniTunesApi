<?php

namespace ApiBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CoreBundle\Application\UserAppService;
use CoreBundle\Entity\User;

class UsersController extends Controller
{
    public function GetAction()
    {
        #return $this->render('ApiBundle:Users:get.html.php', array(
            // ...
        #));
        //$a = new UserAppService();
        $user = new User('guilherme', 'guiajlopes@gmail.com', '1234567');

        $em = $this->getDoctrine()->getManager();

        // tells Doctrine you want to (eventually) save the Product (no queries yet)
        $em->persist($user);

        // actually executes the queries (i.e. the INSERT query)
        $em->flush();

        return new Response('Saved new product with id '.$user->getId());
    }
}
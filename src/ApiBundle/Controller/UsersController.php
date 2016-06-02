<?php

namespace ApiBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CoreBundle\Application\UserAppService;

class UsersController extends Controller
{
    public function GetAction()
    {
        #return $this->render('ApiBundle:Users:get.html.php', array(
            // ...
        #));
        $a = new UserAppService();
		return new Response('Hello world!');
    }
}
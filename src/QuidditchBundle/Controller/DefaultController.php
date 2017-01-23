<?php

namespace QuidditchBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/quidditch")
     */
    public function indexAction()
    {
        return $this->render('QuidditchBundle:Default:index.html.twig');
    }
    
}

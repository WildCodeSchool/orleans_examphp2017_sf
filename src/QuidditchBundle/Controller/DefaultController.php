<?php

namespace QuidditchBundle\Controller;

use QuidditchBundle\Entity\Player;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/quidditch", name="home")
     */
    public function indexAction()
    {

        return $this->render('QuidditchBundle:Default:index.html.twig');
    }
}

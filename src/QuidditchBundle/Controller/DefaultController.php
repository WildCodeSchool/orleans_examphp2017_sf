<?php

namespace QuidditchBundle\Controller;

use QuidditchBundle\Entity\Player;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/quidditch")
     */
    public function indexAction()
    {
        $player = new Player();
        var_dump($player);
        return $this->render('QuidditchBundle:Default:index.html.twig');
    }
}

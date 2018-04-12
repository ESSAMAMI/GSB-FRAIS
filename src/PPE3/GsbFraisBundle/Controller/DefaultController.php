<?php

namespace PPE3\GsbFraisBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('PPE3GsbFraisBundle:Default:index.html.twig');
    }
}

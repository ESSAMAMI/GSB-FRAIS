<?php
/**
 * Created by PhpStorm.
 * User: Electro Depot
 * Date: 11/03/2018
 * Time: 01:09
 */

namespace PPE3\GsbFraisBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProfilController extends  Controller
{

    public function indexAction()
    {
        return $this->render('PPE3GsbFraisBundle:Profil:profil.html.twig');
    }
}
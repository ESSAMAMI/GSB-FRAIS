<?php
/**
 * Created by PhpStorm.
 * User: Electro Depot
 * Date: 11/03/2018
 * Time: 23:48
 */

namespace PPE3\GsbFraisBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ConsulterController extends Controller
{

    public function indexAction(){

        return $this->render('PPE3GsbFraisBundle:Consulter:consulter.html.twig');
    }
}
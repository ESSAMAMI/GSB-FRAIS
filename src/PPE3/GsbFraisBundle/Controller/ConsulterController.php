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

        $em = $this->getDoctrine()->getManager();

        $getFiche = $em->getRepository("PPE3GsbFraisBundle:FicheFrais")->rechercher($this->get('session')->get('id'));
        //$getLigne = $em->getRepository('PPE3GsbFraisBundle:LigneFraisForfait')->rechercherL();

        return $this->render('PPE3GsbFraisBundle:Consulter:consulter.html.twig', array('lesFiches'=>$getFiche) );
    }
}
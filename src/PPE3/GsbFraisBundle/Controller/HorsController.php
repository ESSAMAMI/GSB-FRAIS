<?php
/**
 * Created by PhpStorm.
 * User: Electro Depot
 * Date: 15/04/2018
 * Time: 19:30
 */

namespace PPE3\GsbFraisBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class HorsController extends Controller
{

    public function indexAction(){


        $formAdd = $this->createFormBuilder(array('allow_extra_fields' => true))

            ->add('annee', TextType::class, array('label' => ' ', 'attr' => array('id' =>'firstName', 'class' => 'form-control', 'placeholder'=>'annee')))
            ->add('mois', TextType::class, array('label' => ' ', 'attr' => array('id' =>'firstName', 'class' => 'form-control', 'placeholder'=>'mois')))
            ->add('libelle', TextType::class, array('label' => ' ', 'attr' => array('id' =>'firstName', 'class' => 'form-control', 'placeholder'=>'libelle')))
            ->add('date', TextType::class, array('label' => ' ', 'attr' => array('id' =>'firstName', 'class' => 'form-control', 'placeholder'=>'date')))
            ->add('montant', TextType::class, array('label' => ' ', 'attr' => array('id' =>'firstName', 'class' => 'form-control', 'placeholder'=>'montant')))
            ->add('add', SubmitType::class, array('label' => 'Enregistrer', 'attr' => array('class' => 'btn btn-success')))
            ->add('ccl', ResetType::class, array('label' => 'Cancel', 'attr' => array('class' => 'btn btn-inverse')))

            ->getForm();


        $request = Request::createFromGlobals();
        $formAdd->handleRequest($request);

        if($formAdd->isSubmitted() && $formAdd->isValid()){

           $data = $formAdd->getData() ;
            $em = $this->getDoctrine()->getManager();

            $ficheFrais = $em->getRepository('PPE3GsbFraisBundle:FicheFrais')->findAll();
            foreach ($ficheFrais as $fF){

                global $ficheVisi, $ficheMois ;
                $ficheVisi = $fF;
                $ficheMois = $fF;
            }

            $insert = $em->getRepository("PPE3GsbFraisBundle:LigneFraisHorsForfait")->insertHors($ficheVisi, $ficheMois, $data['libelle'], $data['date'], $data['montant']);

            return $this->render('PPE3GsbFraisBundle:Hors:hors.html.twig', array('form' => $formAdd->createView()));

        }else {
            return $this->render('PPE3GsbFraisBundle:Hors:hors.html.twig', array('form' => $formAdd->createView()));
        }
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Electro Depot
 * Date: 17/03/2018
 * Time: 23:06
 */

namespace PPE3\GsbFraisBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class ModifierController extends Controller
{

    public function indexAction()
    {

        $formChange = $this->createFormBuilder(array('allow_extra_fields' => true))
            ->add('ancienMotDePasse', PasswordType::class, array('label' => ' ', 'attr' => array('id' => 'firstName', 'class' => 'form-control', 'placeholder' => '')))
            ->add('nouveauMotDePasse', PasswordType::class, array('label' => ' ', 'attr' => array('id' => 'firstName', 'class' => 'form-control', 'placeholder' => '')))
            ->add('confirmerMotDePasse', PasswordType::class, array('label' => ' ', 'attr' => array('id' => 'firstName', 'class' => 'form-control', 'placeholder' => '')))
            ->add('add', SubmitType::class, array('label' => 'Enregistrer', 'attr' => array('class' => 'btn btn-success')))
            ->getForm();

        $request = Request::createFromGlobals();
        $formChange->handleRequest($request);

        if ($formChange->isValid() && $formChange->isSubmitted()) {

            $data = $formChange->getData();
            $em = $this->getDoctrine()->getManager();
            $id = $this->get('session')->get('id');
            $visiteur = $em->getRepository('PPE3GsbFraisBundle:Visiteur')->getMdp($id);
            foreach ($visiteur as $unVisi){
                //dump($unVisi);
                if($data['nouveauMotDePasse'] == $data['confirmerMotDePasse']) {
                    if ($data['ancienMotDePasse'] == $unVisi->getMdp()) {

                        $update = $em->getRepository('PPE3GsbFraisBundle:Visiteur')->modifierMDP($id, $data['nouveauMotDePasse']);
                        if ($update == true) {

                            //modifications sont bonnes
                            return $this->render('PPE3GsbFraisBundle:Modifier:modifier.html.twig', array('formChange' => $formChange->createView(), "succes" => 'true'));

                        } else {
                            //erreur de modification
                            return $this->render('PPE3GsbFraisBundle:Modifier:modifier.html.twig', array('formChange' => $formChange->createView(), "errorModif" => 'false'));
                        }

                    } else {
                        //erreur l'ancien mot de passe est faux
                        return $this->render('PPE3GsbFraisBundle:Modifier:modifier.html.twig', array('formChange' => $formChange->createView(), "errorAnc" => 'false'));
                    }
                }else{

                    //les deux mot de passe ne sont pas identiques
                    return $this->render('PPE3GsbFraisBundle:Modifier:modifier.html.twig', array('formChange' => $formChange->createView(), "errorMdp" => 'false'));
                }
            }

        } else {

            return $this->render('PPE3GsbFraisBundle:Modifier:modifier.html.twig', array('formChange'=>$formChange->createView()));
        }
    }
}
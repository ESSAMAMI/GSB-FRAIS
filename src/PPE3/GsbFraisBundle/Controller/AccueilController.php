<?php

namespace PPE3\GsbFraisBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class AccueilController extends Controller
{
    public function indexAction()
    {
        $formConnect = $this->createFormBuilder(array('allow_extra_fields' =>true))
            /* Les champs doivent impérativement respecter le nommage des colonnes dans l'objet en question */
            ->add('login', TextType::class, array('label' => 'Login', 'attr' => array('class' => 'form-control', 'placeholder'=>'a131')))
            ->add('mdp', PasswordType::class, array('label' => 'Mot de passe', 'attr' => array('class' => 'form-control', 'placeholder'=>'******')))
            ->add('type', ChoiceType::class, array('label'=>' ', 'attr' => array('class' => 'form-control'),
                'choices' => array(
                    'Choisissez' => array('Visiteur' => 'Visiteur', 'Comptable' => 'Comptable',),
                ),
            ))
            ->add('Valider', SubmitType::class, array('label' => 'Se connecter', 'attr' => array('class' => 'btn btn-primary btn-block')))
            ->getForm();

        $request = Request::createFromGlobals();
        $formConnect->handleRequest($request);

        if ($formConnect->isSubmitted() && $formConnect->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $data = $formConnect->getData();

            if(strtolower($data['type']) == 'visiteur'){

                $visiteur = $em->getRepository('PPE3GsbFraisBundle:Visiteur')->seConnecter($data['login'],$data['mdp']); //on envoie les données reçus pour tester
                dump($visiteur);

                if(!empty($visiteur)){ //on test si le user existe ou pas !!

                    //on crée une session
                    $session = new Session(); //On insentie la variable session // on la démarre pas elle y est déja

                    foreach ($visiteur as $visi){

                        $session->set('id', $visi->getId());
                        $session->set('nom', $visi->getNom());
                        $session->set('prenom', $visi->getPrenom());

                        return $this->render('PPE3GsbFraisBundle:Profil:profil.html.twig');

                    }

                }else{

                    return $this->render('PPE3GsbFraisBundle:Accueil:accueil.html.twig', array('formConnect' => $formConnect->createView(), 'erreur'=>'false'));
                }
            }else{

                //Traitement pour le comptable ;

            }

        }else{
            return $this->render('PPE3GsbFraisBundle:Accueil:accueil.html.twig', array('formConnect' => $formConnect->createView()));
        }


    }
}

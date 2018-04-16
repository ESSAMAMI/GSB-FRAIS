<?php


namespace PPE3\GsbFraisBundle\Controller;



use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\HttpFoundation\Request;


class AjouterController extends Controller
{

    public function indexAction(){
        //1er FORM

        $formAdd = $this->createFormBuilder(array('allow_extra_fields' => true))
                        ->add('annee', TextType::class, array('label' => ' ', 'attr' => array('id' =>'firstName', 'class' => 'form-control', 'placeholder'=>'')))
                        ->add('mois', TextType::class, array('label' => ' ', 'attr' => array('id' =>'firstName', 'class' => 'form-control', 'placeholder'=>'')))
                        ->add('repasMidi', TextType::class, array('label' => ' ', 'attr' => array('id' =>'firstName', 'class' => 'form-control', 'placeholder'=>'Repas')))
                        ->add('nuit', TextType::class, array('label' => ' ', 'attr' => array('id' =>'firstName', 'class' => 'form-control', 'placeholder'=>'Nuitée')))
                        ->add('etap', TextType::class, array('label' => ' ', 'attr' => array('id' =>'firstName', 'class' => 'form-control', 'placeholder'=>'Étape')))
                        ->add('km', TextType::class, array('label' => ' ', 'attr' => array('id' =>'firstName', 'class' => 'form-control', 'placeholder'=>'Km')))
                        ->add('nbJ', TextType::class, array('label' => ' ', 'attr' => array('id' =>'firstName', 'class' => 'form-control', 'placeholder'=>'Nombre de justificatif(s)')))
                        ->add('total', TextType::class, array('label' => ' ', 'attr' => array('id' =>'firstName', 'class' => 'form-control', 'placeholder'=>'Total')))
                        ->add('add', SubmitType::class, array('label' => 'Enregistrer', 'attr' => array('class' => 'btn btn-success')))
                        ->add('ccl', ResetType::class, array('label' => 'Cancel', 'attr' => array('class' => 'btn btn-inverse')))
                        ->getForm();


        $request = Request::createFromGlobals();
        $formAdd->handleRequest($request);


        if($formAdd->isSubmitted() && $formAdd->isValid()){

            $data = $formAdd->getData();

            $em = $this->getDoctrine()->getManager();


            $visiteur = $em->getRepository('PPE3GsbFraisBundle:Visiteur')->find($this->get('session')->get('id'));

            $etat = $em->getRepository('PPE3GsbFraisBundle:Etat')->find('CR');
            $mois = $data['mois'];
            $nbJ = $data['nbJ'];
            $montant = $data['total'];
            $date = date("Y")."-".date("m")."-".date("d");

            $insertFicheFrais = $em->getRepository('PPE3GsbFraisBundle:FicheFrais')->insFicheFrais($visiteur, $etat, $mois, $nbJ, $montant, $date);

            $etap = $em->getRepository('PPE3GsbFraisBundle:Fraisforfait')->find('ETP');
            $km = $em->getRepository('PPE3GsbFraisBundle:Fraisforfait')->find('KM');
            $nuitee = $em->getRepository('PPE3GsbFraisBundle:Fraisforfait')->find('NUI');
            $repas = $em->getRepository('PPE3GsbFraisBundle:Fraisforfait')->find('REP');


            $ficheFrais = $em->getRepository('PPE3GsbFraisBundle:FicheFrais')->findAll();

            $totalEtape = $data['etap'] * $etap->getMontant();
            $totalKm = $data['km'] * $km->getMontant();
            $totalNu = $data['nuit'] * $nuitee->getMontant();
            $totalRep = $data['repasMidi'] * $repas->getMontant();

            $etpFraisForfait = $em->getRepository('PPE3GsbFraisBundle:FraisForfait')->findAll();

            foreach ($ficheFrais as $fF){

                global $ficheVisi, $ficheMois ;
                $ficheVisi = $fF;
                $ficheMois = $fF;
            }
            $tab = array($totalEtape, $totalKm, $totalNu, $totalRep);

            //dump($tab);

            $insertFF = $em->getRepository('PPE3GsbFraisBundle:LigneFraisForfait')->insererFraisForfait($ficheVisi, $ficheMois , $etpFraisForfait, $tab);

            return $this->render('PPE3GsbFraisBundle:Ajouter:ajouter.html.twig', array('formAdd' => $formAdd->createView()));

        }else{

            return $this->render('PPE3GsbFraisBundle:Ajouter:ajouter.html.twig', array('formAdd' => $formAdd->createView()));
        }


    }
}
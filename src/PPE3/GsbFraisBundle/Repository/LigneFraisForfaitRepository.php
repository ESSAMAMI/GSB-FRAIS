<?php


namespace PPE3\GsbFraisBundle\Repository;
use Doctrine\ORM\EntityRepository;
use PPE3\GsbFraisBundle\Entity\LigneFraisForfait;

//use PPE3\GsbFraisBundle\Entity\LigneFraisForfait;

class LigneFraisForfaitRepository extends EntityRepository
{

    public function insererFraisForfait($vid, $mois, $ffId, $quantite){

        $i = 0 ;
        foreach($ffId as $fId){

            $ligneFraisForfait = new LigneFraisForfait($vid, $mois, $fId, $quantite[$i]);
            $i = $i + 1 ;
            $em = $this->getEntityManager();
            $em->persist($ligneFraisForfait);

            $resultat = $em->flush();

        }

        return $resultat;
    }
}
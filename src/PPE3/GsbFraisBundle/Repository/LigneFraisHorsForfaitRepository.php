<?php
/**
 * Created by PhpStorm.
 * User: Electro Depot
 * Date: 15/04/2018
 * Time: 22:59
 */

namespace PPE3\GsbFraisBundle\Repository;


use Doctrine\ORM\EntityRepository;
use PPE3\GsbFraisBundle\Entity\LigneFraisHorsForfait;

class LigneFraisHorsForfaitRepository extends EntityRepository
{
    public function insertHors($visiteur, $mois, $libelle, $date, $montant){

        $ficheHors = new LigneFraisHorsForfait($visiteur, $mois, $libelle, $date, $montant);

        $em = $this->getEntityManager();
        $em->persist($ficheHors);

        $resultat = $em->flush();

        return $resultat;
    }
}
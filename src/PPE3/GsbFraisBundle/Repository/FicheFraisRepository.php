<?php


namespace PPE3\GsbFraisBundle\Repository;
use Doctrine\ORM\EntityRepository;
use PPE3\GsbFraisBundle\Entity\FicheFrais;
use Doctrine;

class FicheFraisRepository extends EntityRepository
{

    public function insFicheFrais($vId, $etId, $mois, $nbJ, $montant, $dateMod){

        $ficheFrais = new FicheFrais($vId,$mois,$etId, $nbJ, $montant, $dateMod);

        $em = $this->getEntityManager();
        $em->persist($ficheFrais);

        $em->flush();

    }

    public function getUser($id){

        $queryBuilder = $this->_em->createQueryBuilder()
            ->select('f')
            ->from($this->_entityName, 'f')
            ->where('f.visiteur = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult();

        return $queryBuilder;
    }

    public function rechercher($id){

        $queryBuilder = $this->_em->createQueryBuilder('f')
            ->select('f')
            ->from($this->_entityName, 'f')
            ->join('f.visiteur','v') // Jointure avec Visiteur
            ->join('f.etat', 'e') //Jointure avec Etat
            ->where('f.visiteur = :id')
            ->setParameter('id', $id)
            ->addSelect('e')
            ->addSelect('v')
            ->getQuery()
            ->getResult();

        return $queryBuilder;

    }
}
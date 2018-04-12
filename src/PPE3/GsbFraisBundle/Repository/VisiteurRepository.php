<?php

namespace PPE3\GsbFraisBundle\Repository;
use PPE3\GsbFraisBundle\Entity\Visiteur;
use Doctrine\ORM\EntityRepository;


class VisiteurRepository extends EntityRepository
{

    public function seConnecter($login, $mdp){

        $queryBuilder = $this->_em->createQueryBuilder()
                        ->select('v')
                        ->from($this->_entityName, 'v')
                        ->where('v.login = :login')
                        ->andWhere('v.mdp = :mdp')
                        ->setParameter('login',$login)
                        ->setParameter('mdp', $mdp)
                        ->getQuery()
                        ->getResult();

        return $queryBuilder;
    }

    public function getMdp($id){

        $queryBuilder = $this->_em->createQueryBuilder()
            ->select('v')
            ->from($this->_entityName, 'v')
            ->where('v.id = :id')
            ->setParameter('id',$id)
            ->getQuery()
            ->getResult();

        return $queryBuilder;
    }
    public function modifierMDP($idVisi, $mdp){

        $queryBuilder = $this->_em->createQueryBuilder();
        $query = $queryBuilder->update($this->_entityName, 'v')
                        ->set('v.mdp', $queryBuilder->expr()->literal($mdp))
                        ->where('v.id = :id')
                        ->setParameter('id', $idVisi)
                        ->getQuery();

        $resultat = $query->execute();
        return $resultat;
    }

}
<?php


namespace PPE3\GsbFraisBundle\Repository;
use Doctrine\ORM\EntityRepository;
use PPE3\GsbFraisBundle\Entity\FicheFrais;
use Doctrine;

class FicheFraisRepository extends EntityRepository
{
    //visiteur_id 	etat_id 	mois 	nbJustificatif 	montantValide 	dateModif

    public function insFicheFrais($vId, $etId, $mois, $nbJ, $montant, $dateMod){

        $ficheFrais = new FicheFrais();

        $ficheFrais->setVisiteur($vId);
        $ficheFrais->setEtat($etId);
        $ficheFrais->setMois($mois);
        $ficheFrais->setNbJustificatif($nbJ);
        $ficheFrais->setMontant($montant);
        $ficheFrais->setDateModif($dateMod);


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
}
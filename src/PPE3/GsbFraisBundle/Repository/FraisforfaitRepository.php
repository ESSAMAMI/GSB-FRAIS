<?php
/**
 * Created by PhpStorm.
 * User: Electro Depot
 * Date: 29/03/2018
 * Time: 21:30
 */

namespace PPE3\GsbFraisBundle\Repository;
use Doctrine\ORM\EntityRepository;
use PPE3\GsbFraisBundle\Entity\Fraisforfait;


class FraisforfaitRepository extends EntityRepository
{

    public function getFraisForfait(){

        $queryBuilder = $this->_em->createQueryBuilder()
            ->select('f')
            ->from($this->_entityName, 'f')
            ->getQuery()
            ->getResult();

        return $queryBuilder;
    }
}
<?php

namespace AppBundle\Repository;

class ParroquiaRepository extends \Doctrine\ORM\EntityRepository
{
    public function getPorCanton($value)
    {
        return $this->createQueryBuilder('c')
            ->join('c.canton', 'a')
            ->where('a.id = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getResult();
    }
}

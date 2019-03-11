<?php

namespace AppBundle\Repository;

class CantonRepository extends \Doctrine\ORM\EntityRepository
{
    public function getPorProvincia($value)
    {
        return $this->createQueryBuilder('c')
            ->join('c.provincia', 'a')
            ->where('a.id = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getResult();
    }
}

<?php

namespace AppBundle\Repository;

class CategoriaRepository extends \Doctrine\ORM\EntityRepository
{
    public function getPorClasificacion($value)
    {
        return $this->createQueryBuilder('e')
            ->join('e.clasificacion', 'a')
            ->andWhere('a.id = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getResult();
    }
}

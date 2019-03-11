<?php

namespace AppBundle\Repository;

class ClasificacionRepository extends \Doctrine\ORM\EntityRepository
{
    public function getPorActividad($value)
    {
        return $this->createQueryBuilder('c')
            ->join('c.actividad', 'a')
            ->where('a.id = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getResult();
    }
}

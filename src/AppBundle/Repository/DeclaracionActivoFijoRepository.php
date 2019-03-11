<?php

namespace AppBundle\Repository;

class DeclaracionActivoFijoRepository extends \Doctrine\ORM\EntityRepository
{
    public function getByEstablecimiento($establecimiento)
    {
        return $this->createQueryBuilder('d')
            ->join('d.cabecera','c')
            ->join('c.establecimiento','e')
            ->where("e.id = :id")
            ->setParameter('id',$establecimiento)
            ->getQuery()
            ->getResult();
    }
}

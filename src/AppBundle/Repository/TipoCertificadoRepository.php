<?php

namespace AppBundle\Repository;

class TipoCertificadoRepository extends \Doctrine\ORM\EntityRepository
{
    public function getPorCategoria($value)
    {
        return $this->createQueryBuilder('e')
            ->join('e.categoria', 'a')
            ->andWhere('a.id = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getResult();
    }

    public function getByIds($ids)
    {
        return $this->createQueryBuilder('c')
            ->where("c.id IN(:ids)")
            ->setParameter('ids',array_values($ids))
            ->getQuery()
            ->getResult();
    }

    public function getByEstablecimiento($establecimiento)
    {
        return $this->createQueryBuilder('c')
            ->join('c.establecimientos','e')
            ->where("e.id = :id")
            ->setParameter('id',$establecimiento)
            ->getQuery()
            ->getResult();
    }
}

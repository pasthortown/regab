<?php

namespace AppBundle\Repository;

use AppBundle\Entity\User;

class EstablecimientoRepository extends \Doctrine\ORM\EntityRepository
{
    public function findByUsuario(User $value)
    {
        return $this->createQueryBuilder('e')
            ->join('e.user', 'u')
            ->andWhere('u.id = :val')
            ->setParameter('val', $value->getId())
            ->getQuery()
            ->getResult();
    }
}

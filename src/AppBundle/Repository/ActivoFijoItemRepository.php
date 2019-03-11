<?php

namespace AppBundle\Repository;

use AppBundle\Entity\DeclaracionActivoFijo;

class ActivoFijoItemRepository extends \Doctrine\ORM\EntityRepository
{
    public function getByIds($ids)
    {
        return $this->createQueryBuilder('af')
            ->where("af.id IN(:ids)")
            ->setParameter('ids',array_values($ids))
            ->getQuery()
            ->getResult();
    }

}

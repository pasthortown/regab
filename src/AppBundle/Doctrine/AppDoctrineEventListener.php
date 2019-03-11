<?php
/**
 * Created by PhpStorm.
 * User: yorea
 * Date: 10/16/2018
 * Time: 9:58 a.m.
 */

namespace AppBundle\Doctrine;

use AppBundle\Entity\Actividad;
use AppBundle\Entity\Establecimiento;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Event\LifecycleEventArgs;

class AppDoctrineEventListener
{

    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();

        // only act on some "Establecimiento" entity
        if ($entity instanceof Establecimiento) {

            /***@var $entity Establecimiento **/
            if($entity->getRegistroSiete()!=null){
                return;
            }
            $cnt = $entity->getParroquia()->getCanton();
            $cntSiglas = $cnt->getSigla();
            $provSigla = $cnt->getProvincia()->getSigla();

            /**@var $em EntityManager*/
            $em = $args->getObjectManager();
            /**@var $actividad Actividad*/
            $actividad = $em->find(Actividad::class,1);
            $actividad = $em->find(Actividad::class,1,\Doctrine\DBAL\LockMode::OPTIMISTIC, $actividad->getVersion());

            $serial = $actividad->getSecuencial()+1; //todo: arreglar esto, para obtener de la bd
            $actividad->setSecuencial($serial);

            $lengNumbers = 8;

            $codigo = $provSigla.$cntSiglas.'AB-'.str_pad($serial, $lengNumbers, "0", STR_PAD_LEFT);

            $entity->setRegistroSiete($codigo);

            $em->persist($actividad);
            $em->flush();

            return;
        }
    }
}
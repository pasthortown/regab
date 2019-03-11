<?php
/**
 * Created by PhpStorm.
 * User: yorea
 * Date: 10/15/2018
 * Time: 9:26 p.m.
 */

namespace AppBundle\EventListener;

use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;
use Doctrine\ORM\EntityManager;
use AppBundle\Entity\User;

class JWTCreatedListener
{
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    /**
     * @param JWTCreatedEvent $event
     *
     * @return void
     */
    public function onJWTCreated(JWTCreatedEvent $event)
    {
        $payload = $event->getData();

        $username = $payload['username'];

        /**
         * @var $user User
         */
        $user = $this->em->getRepository(User::class)->findOneByEmail($username);

        $payload['name'] = $user->getName();

        $event->setData($payload);
    }

}
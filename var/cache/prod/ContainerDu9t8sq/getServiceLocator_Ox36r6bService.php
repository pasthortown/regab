<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'service_locator.ox36r6b' shared service.

return $this->services['service_locator.ox36r6b'] = new \Symfony\Component\DependencyInjection\ServiceLocator(array('entity' => function () {
    $f = function (\AppBundle\Entity\Establecimiento $v) { return $v; }; return $f(${($_ = isset($this->services['autowired.AppBundle\Entity\Establecimiento']) ? $this->services['autowired.AppBundle\Entity\Establecimiento'] : $this->services['autowired.AppBundle\Entity\Establecimiento'] = new \AppBundle\Entity\Establecimiento()) && false ?: '_'});
}));

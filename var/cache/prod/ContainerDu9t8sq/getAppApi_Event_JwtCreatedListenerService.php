<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'app_api.event.jwt_created_listener' shared autowired service.

return $this->services['app_api.event.jwt_created_listener'] = new \AppBundle\EventListener\JWTCreatedListener(${($_ = isset($this->services['doctrine.orm.default_entity_manager']) ? $this->services['doctrine.orm.default_entity_manager'] : $this->load('getDoctrine_Orm_DefaultEntityManagerService.php')) && false ?: '_'});

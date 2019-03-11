<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'lexik_jwt_authentication.generate_token_command' shared service.

$this->services['lexik_jwt_authentication.generate_token_command'] = $instance = new \Lexik\Bundle\JWTAuthenticationBundle\Command\GenerateTokenCommand(${($_ = isset($this->services['lexik_jwt_authentication.jwt_manager']) ? $this->services['lexik_jwt_authentication.jwt_manager'] : $this->load('getLexikJwtAuthentication_JwtManagerService.php')) && false ?: '_'}, new RewindableGenerator(function () {
    yield 0 => ${($_ = isset($this->services['security.user.provider.concrete.api_user_provider']) ? $this->services['security.user.provider.concrete.api_user_provider'] : $this->load('getSecurity_User_Provider_Concrete_ApiUserProviderService.php')) && false ?: '_'};
}, 1));

$instance->setName('lexik:jwt:generate-token');

return $instance;
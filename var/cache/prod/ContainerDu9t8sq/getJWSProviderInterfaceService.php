<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'Lexik\Bundle\JWTAuthenticationBundle\Services\JWSProvider\JWSProviderInterface' shared service.

return $this->services['Lexik\Bundle\JWTAuthenticationBundle\Services\JWSProvider\JWSProviderInterface'] = new \Lexik\Bundle\JWTAuthenticationBundle\Services\JWSProvider\LcobucciJWSProvider(${($_ = isset($this->services['lexik_jwt_authentication.key_loader']) ? $this->services['lexik_jwt_authentication.key_loader'] : $this->services['lexik_jwt_authentication.key_loader'] = new \Lexik\Bundle\JWTAuthenticationBundle\Services\KeyLoader\RawKeyLoader(($this->targetDirs[3].'/app/config/jwt/private.pem'), ($this->targetDirs[3].'/app/config/jwt/public.pem'), 'secret')) && false ?: '_'}, 'openssl', 'RS512', 36000, 0);

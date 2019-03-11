<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdProjectContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($rawPathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($rawPathinfo);
        $trimmedPathinfo = rtrim($pathinfo, '/');
        $context = $this->context;
        $request = $this->request ?: $this->createRequest($pathinfo);
        $requestMethod = $canonicalMethod = $context->getMethod();

        if ('HEAD' === $requestMethod) {
            $canonicalMethod = 'GET';
        }

        // user_login_check
        if ('/api/auth/login_check' === $pathinfo) {
            $ret = array (  '_controller' => 'AppBundle\\Controller\\ApiController::getLoginCheckAction',  '_route' => 'user_login_check',);
            if (!in_array($requestMethod, array('POST'))) {
                $allow = array_merge($allow, array('POST'));
                goto not_user_login_check;
            }

            return $ret;
        }
        not_user_login_check:

        if (0 === strpos($pathinfo, '/api/v1')) {
            if (0 === strpos($pathinfo, '/api/v1/users')) {
                // user_register
                if ('/api/v1/users' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\ApiController::registerAction',  '_route' => 'user_register',);
                    if (!in_array($requestMethod, array('POST'))) {
                        $allow = array_merge($allow, array('POST'));
                        goto not_user_register;
                    }

                    return $ret;
                }
                not_user_register:

                // user_change_password
                if ('/api/v1/users/change_password' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\ApiController::passwordAction',  '_route' => 'user_change_password',);
                    if (!in_array($requestMethod, array('POST'))) {
                        $allow = array_merge($allow, array('POST'));
                        goto not_user_change_password;
                    }

                    return $ret;
                }
                not_user_change_password:

                // app_users_list
                if ('/api/v1/users' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\ApiController::listUsers',  '_route' => 'app_users_list',);
                    if (!in_array($canonicalMethod, array('GET'))) {
                        $allow = array_merge($allow, array('GET'));
                        goto not_app_users_list;
                    }

                    return $ret;
                }
                not_app_users_list:

            }

            elseif (0 === strpos($pathinfo, '/api/v1/establecimientos')) {
                // app_establecimientos_by_user
                if ('/api/v1/establecimientos/get_by_usuario' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\ApiController::listEstablecimientosByUser',  '_route' => 'app_establecimientos_by_user',);
                    if (!in_array($canonicalMethod, array('GET'))) {
                        $allow = array_merge($allow, array('GET'));
                        goto not_app_establecimientos_by_user;
                    }

                    return $ret;
                }
                not_app_establecimientos_by_user:

                // app_establecimientos_list_all
                if ('/api/v1/establecimientos' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\ApiController::listEstablecimientos',  '_route' => 'app_establecimientos_list_all',);
                    if (!in_array($canonicalMethod, array('GET'))) {
                        $allow = array_merge($allow, array('GET'));
                        goto not_app_establecimientos_list_all;
                    }

                    return $ret;
                }
                not_app_establecimientos_list_all:

                // app_establecimiento_create
                if ('/api/v1/establecimientos' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\ApiController::crearEstablecimiento',  '_route' => 'app_establecimiento_create',);
                    if (!in_array($requestMethod, array('POST'))) {
                        $allow = array_merge($allow, array('POST'));
                        goto not_app_establecimiento_create;
                    }

                    return $ret;
                }
                not_app_establecimiento_create:

                // app_establecimientos_get
                if (preg_match('#^/api/v1/establecimientos/(?P<entity>[^/]++)$#sD', $pathinfo, $matches)) {
                    $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'app_establecimientos_get')), array (  '_controller' => 'AppBundle\\Controller\\ApiController::getEstablecimiento',));
                    if (!in_array($canonicalMethod, array('GET'))) {
                        $allow = array_merge($allow, array('GET'));
                        goto not_app_establecimientos_get;
                    }

                    return $ret;
                }
                not_app_establecimientos_get:

            }

            elseif (0 === strpos($pathinfo, '/api/v1/catalogos')) {
                if (0 === strpos($pathinfo, '/api/v1/catalogos/c')) {
                    // app_clasificaciones
                    if ('/api/v1/catalogos/clasificaciones' === $pathinfo) {
                        $ret = array (  '_controller' => 'AppBundle\\Controller\\ApiController::clasificaciones',  '_route' => 'app_clasificaciones',);
                        if (!in_array($canonicalMethod, array('GET'))) {
                            $allow = array_merge($allow, array('GET'));
                            goto not_app_clasificaciones;
                        }

                        return $ret;
                    }
                    not_app_clasificaciones:

                    if (0 === strpos($pathinfo, '/api/v1/catalogos/ca')) {
                        // app_categorias
                        if ('/api/v1/catalogos/categorias' === $pathinfo) {
                            $ret = array (  '_controller' => 'AppBundle\\Controller\\ApiController::categorias',  '_route' => 'app_categorias',);
                            if (!in_array($canonicalMethod, array('GET'))) {
                                $allow = array_merge($allow, array('GET'));
                                goto not_app_categorias;
                            }

                            return $ret;
                        }
                        not_app_categorias:

                        // app_categoria_certificados
                        if ('/api/v1/catalogos/categoria_certificados' === $pathinfo) {
                            $ret = array (  '_controller' => 'AppBundle\\Controller\\ApiController::categoriaCertificados',  '_route' => 'app_categoria_certificados',);
                            if (!in_array($canonicalMethod, array('GET'))) {
                                $allow = array_merge($allow, array('GET'));
                                goto not_app_categoria_certificados;
                            }

                            return $ret;
                        }
                        not_app_categoria_certificados:

                        // app_cantones
                        if ('/api/v1/catalogos/cantones' === $pathinfo) {
                            $ret = array (  '_controller' => 'AppBundle\\Controller\\ApiController::cantones',  '_route' => 'app_cantones',);
                            if (!in_array($canonicalMethod, array('GET'))) {
                                $allow = array_merge($allow, array('GET'));
                                goto not_app_cantones;
                            }

                            return $ret;
                        }
                        not_app_cantones:

                    }

                    // app_certificados
                    if ('/api/v1/catalogos/certificados' === $pathinfo) {
                        $ret = array (  '_controller' => 'AppBundle\\Controller\\ApiController::certificadosByCategoria',  '_route' => 'app_certificados',);
                        if (!in_array($canonicalMethod, array('GET'))) {
                            $allow = array_merge($allow, array('GET'));
                            goto not_app_certificados;
                        }

                        return $ret;
                    }
                    not_app_certificados:

                }

                // app_provincias
                if ('/api/v1/catalogos/provincias' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\ApiController::provincias',  '_route' => 'app_provincias',);
                    if (!in_array($canonicalMethod, array('GET'))) {
                        $allow = array_merge($allow, array('GET'));
                        goto not_app_provincias;
                    }

                    return $ret;
                }
                not_app_provincias:

                // app_parroquias
                if ('/api/v1/catalogos/parroquias' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\ApiController::parroquias',  '_route' => 'app_parroquias',);
                    if (!in_array($canonicalMethod, array('GET'))) {
                        $allow = array_merge($allow, array('GET'));
                        goto not_app_parroquias;
                    }

                    return $ret;
                }
                not_app_parroquias:

                // app_activos_fijos_items
                if ('/api/v1/catalogos/activos_fijos_items' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\ApiController::activosFijos',  '_route' => 'app_activos_fijos_items',);
                    if (!in_array($canonicalMethod, array('GET'))) {
                        $allow = array_merge($allow, array('GET'));
                        goto not_app_activos_fijos_items;
                    }

                    return $ret;
                }
                not_app_activos_fijos_items:

            }

        }

        // homepage
        if ('' === $trimmedPathinfo) {
            $ret = array (  '_controller' => 'AppBundle\\Controller\\DefaultController::indexAction',  '_route' => 'homepage',);
            if ('/' === substr($pathinfo, -1)) {
                // no-op
            } elseif ('GET' !== $canonicalMethod) {
                goto not_homepage;
            } else {
                return array_replace($ret, $this->redirect($rawPathinfo.'/', 'homepage'));
            }

            return $ret;
        }
        not_homepage:

        if ('/' === $pathinfo && !$allow) {
            throw new Symfony\Component\Routing\Exception\NoConfigurationException();
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}

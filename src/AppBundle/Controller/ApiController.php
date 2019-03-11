<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ActivoFijoItem;
use AppBundle\Entity\CabeceraActivoFijo;
use AppBundle\Entity\Canton;
use AppBundle\Entity\Categoria;
use AppBundle\Entity\CategoriaCertificado;
use AppBundle\Entity\Clasificacion;
use AppBundle\Entity\DeclaracionActivoFijo;
use AppBundle\Entity\Establecimiento;
use AppBundle\Entity\Parroquia;
use AppBundle\Entity\Provincia;
use AppBundle\Entity\TipoCertificado;
use AppBundle\Entity\User;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class ApiController
 *
 * @Route("/api")
 */
class ApiController extends FOSRestController
{
    /**
     * @Rest\Post("/auth/login_check", name="user_login_check")
     *
     */
    public function getLoginCheckAction() {}

//    /**
//     * @Rest\Post("/auth/register", name="user_register")
//     *
//     */
//    public function registerAction(Request $request, UserPasswordEncoderInterface $encoder) {
//        $serializer = $this->get('jms_serializer');
//        $em = $this->getDoctrine()->getManager();
//
//        $user = [];
//        $message = "";
//
//        try {
//            $code = 200;
//            $error = false;
//
//            $name = $request->request->get('_name');
//            $email = $request->request->get('_email');
//            $password = $request->request->get('_password');
//            $roles = $request->request->get('_roles',array());
//
//            $user = new User();
//            $user->setName($name);
//            $user->setEmail($email);
//            $user->setPlainPassword($password);
//            $user->setPassword($encoder->encodePassword($user, $password));
//            $user->setRoles($roles);
//
//            $em->persist($user);
//            $em->flush();
//
//        } catch (Exception $ex) {
//            $code = 500;
//            $error = true;
//            $message = "An error has occurred trying to register the user - Error: {$ex->getMessage()}";
//        }
//
//        $response = [
//            'code' => $code,
//            'error' => $error,
//            'data' => $code == 200 ? $user : $message,
//        ];
//
//        return new Response($serializer->serialize($response, "json"));
//    }

    /**
     * @Rest\Post("/v1/users", name="user_register")
     *
     */
    public function registerAction(Request $request, UserPasswordEncoderInterface $encoder) {
        $serializer = $this->get('jms_serializer');
        $em = $this->getDoctrine()->getManager();

        $user = [];
        $message = "";

        try {
            $code = 200;
            $error = false;

            $name = $request->request->get('_name');
            $email = $request->request->get('_email');
            $cargo = $request->request->get('_cargo');
            $password = $request->request->get('_password');
            $roles = $request->request->get('_roles',array());

            $user = new User();
            $user->setName($name);
            $user->setEmail($email);
            $user->setCargo($cargo);
            $user->setPlainPassword($password);
            $user->setPassword($encoder->encodePassword($user, $password));
            $user->setRoles($roles);


            $em->persist($user);
            $em->flush();

        } catch (Exception $ex) {
            $code = 500;
            $error = true;
            $message = "An error has occurred trying to register the user - Error: {$ex->getMessage()}";
        }

        $response = [
            'code' => $code,
            'error' => $error,
            'data' => $code == 200 ? $user : $message,
        ];

        return new Response($serializer->serialize($response, "json"));
    }

    /**
     * @Rest\Post("/v1/users/change_password", name="user_change_password")
     *
     */
    public function passwordAction(Request $request) {
        $serializer = $this->get('jms_serializer');
        $em = $this->getDoctrine()->getManager();

        /**@var $user User**/
        $user = $this->getUser();

        $factory = $this->get('security.encoder_factory');

        $encoder = $factory->getEncoder($user);

        $message = "";

        $get = $request->query->all();
        try {
            $code = 200;
            $error = false;
//            $success = true;

//            $oldpass = $request->request->get('_oldpass');
            $newpass = $get['_newpass'];

            $user->setPassword($encoder->encodePassword($newpass,$user->getSalt()));

            $em->persist($user);
            $em->flush();

        } catch (Exception $ex) {
            $code = 500;
            $error = true;
            $message = "An error has occurred trying to update the user password - Error: {$ex->getMessage()}";
        }

        $response = [
            'code' => $code,
            'error' => $error,
//            'success' => $success,
            'data' => $code == 200 ? $user : $message,
        ];

        return new Response($serializer->serialize($response, "json"));
    }

    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/v1/users", name="app_users_list", methods={"GET"})
     */
    public function listUsers(Request $request)
    {
        $serializer = $this->get('jms_serializer');
        $em = $this->getDoctrine()->getManager();

        $code = 200;
        $error = false;
        $message = "";

        $users = [];

        try {
            $users = $em->getRepository(User::class)->findAll();
        }catch (Exception $ex) {
            $code = 500;
            $error = true;
            $message = "An error has occurred trying to get Users - Error: {$ex->getMessage()}";
        }

        $response = [
            'code' => $code,
            'error' => $error,
            'data' => $code == 200 ? $users : $message,
        ];

        return new Response($serializer->serialize($response, "json"));
    }

    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/v1/establecimientos/get_by_usuario", name="app_establecimientos_by_user", methods={"GET"})
     */
    public function listEstablecimientosByUser(Request $request)
    {
        $serializer = $this->get('jms_serializer');
        $em = $this->getDoctrine()->getManager();

        $user = $this->getUser();

        $code = 200;
        $error = false;
        $message = "";

        $sistemas = [];

        try {

            $sistemas = $em->getRepository(Establecimiento::class)->findByUsuario($user);
        }catch (Exception $ex) {
            $code = 500;
            $error = true;
            $message = "An error has occurred trying to get Establecimientos by User - Error: {$ex->getMessage()}";
        }

        $response = [
            'code' => $code,
            'error' => $error,
            'data' => $code == 200 ? $sistemas : $message,
        ];

        return new Response($serializer->serialize($response, "json"));
    }

    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/v1/establecimientos", name="app_establecimientos_list_all", methods={"GET"})
     */
    public function listEstablecimientos(Request $request)
    {
        $serializer = $this->get('jms_serializer');
        $em = $this->getDoctrine()->getManager();

        $code = 200;
        $error = false;
        $message = "";

        $result = [];

        try {
            $result = $em->getRepository(Establecimiento::class)->findAll();
        }catch (Exception $ex) {
            $code = 500;
            $error = true;
            $message = "An error has occurred trying to get Establecimientos - Error: {$ex->getMessage()}";
        }

        $response = [
            'code' => $code,
            'error' => $error,
            'data' => $code == 200 ? $result : $message,
        ];

        return new Response($serializer->serialize($response, "json"));
    }

    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/v1/establecimientos", name="app_establecimiento_create", methods={"POST"})
     */
    public function crearEstablecimiento(Request $request)
    {
        $serializer = $this->get('jms_serializer');
        $em = $this->getDoctrine()->getManager();

        $user = $this->getUser();

        $code = 200;
        $error = false;
        $message = "";

        $establecimiento = new Establecimiento();
        $establecimiento->setUser($user);

        $hombresDiscapacidadFisica = $request->request->get('hombres_discapacidad_fisica');
        $hombresDiscapacidadIntelectual = $request->request->get('hombres_discapacidad_intelectual');
        $hombresDiscapacidadSensorial = $request->request->get('hombres_discapacidad_sensorial');
        $hombresExtranjeros = $request->request->get('hombres_extranjeros');
        $hombresIdiomaExtranjero = $request->request->get('hombres_idioma_extranjero');
        $hombresTituloProfesional = $request->request->get('hombres_titulo_profesional');
        $hombresTotal = $request->request->get('hombres_total');

        $mujeresDiscapacidadFisica = $request->request->get('mujeres_discapacidad_fisica');
        $mujeresDiscapacidadIntelectual = $request->request->get('mujeres_discapacidad_intelectual');
        $mujeresDiscapacidadSensorial = $request->request->get('mujeres_discapacidad_sensorial');
        $mujeresExtranjeros = $request->request->get('mujeres_extranjeros');
        $mujeresIdiomaExtranjero = $request->request->get('mujeres_idioma_extranjero');
        $mujeresTituloProfesional = $request->request->get('mujeres_titulo_profesional');
        $mujeresTotal = $request->request->get('mujeres_total');

        $actividad_economica_sri = $request->request->get('actividad_economica_sri');
        $local = $request->request->get('local');
        $tipo_establecimiento = $request->request->get('tipo_establecimiento');
        $contabilidad = $request->request->get('obligado_contabilidad');
        $contribuyente = intval($request->request->get('tipo_contribuyente'));
        $calle_principal = $request->request->get('calle_principal');
        $calle_referencia = $request->request->get('calle_referencia');
        $calle_interseccion = $request->request->get('calle_interseccion');
        $celular = $request->request->get('telefono_celular');
        $email_ruc = $request->request->get('correo_ruc');
        $email_establecimiento = $request->request->get('correo_establecimiento');
        $longitud = $request->request->get('longitud');
        $latitud = $request->request->get('latitud');
        $fecha_registro = $request->request->get('fecha_registro');
        $nombre = $request->request->get('nombre_comercial');
        $pagina_web = $request->request->get('pagina_web');

        $razon_social = $request->request->get('razon_social');
        $registro_siit = $request->request->get('registro_siit');
        $ruc = $request->request->get('ruc');
        $telefono_convencional = $request->request->get('telefono_fijo');

        $categoriaId = $request->request->get('categoria');
        $parroquiaId = $request->request->get('parroquia');
        $certificadosParam = $request->request->get('certificados');
        $activos_fijos_items = $request->request->get('activos_fijos_items');
        $total_activos_fijos = $request->request->get('total_activos_fijos');
        $anio_declaracion = $request->request->get('anio_declaracion');
        $numeroCasa = $request->request->get('numero_casa');
        $numeroEstablecimiento = $request->request->get('numero_establecimiento');


        $mesas = $request->request->get('total_mesas');
        $plazas = $request->request->get('total_plazas');

        $estacionamientos = $request->request->get('estacionamientos');
        $idiomas = $request->request->get('idiomas');
        $facturacion = $request->request->get('facturacion');
        $formapago = $request->request->get('formapago');
        $internet = $request->request->get('internet');
        $edificioPatrimonial = $request->request->get('edificio_patrimonial');
        $generadorElectrico = $request->request->get('generador_electrico');
        $exposicionesArte = $request->request->get('exposiciones_arte');
        $servicioDomicilio = $request->request->get('servicio_domicilio');

        $numeroExpSupercias = $request->request->get('numero_expediente_supercias');
        $identRep = $request->request->get('identificacion_representante_legal');
        $fechaNombramientoRep = $request->request->get('fecha_nombramiento_representante_legal');
        $nombreRep = $request->request->get('nombre_representante_legal');//
        $nombreFranquiciaCadena = $request->request->get('nombre_franquicia_cadena');

        //actualizar los campos del establecimiento
        $establecimiento->setHombresDiscapacidadFisica($hombresDiscapacidadFisica);
        $establecimiento->setHombresDiscapacidadIntelectual($hombresDiscapacidadIntelectual);
        $establecimiento->setHombresDiscapacidadSensorial($hombresDiscapacidadSensorial);
        $establecimiento->setHombresExtranjeros($hombresExtranjeros);
        $establecimiento->setHombresIdiomaExtranjero($hombresIdiomaExtranjero);
        $establecimiento->setHombresTituloProfesional($hombresTituloProfesional);
        $establecimiento->setHombresTotal($hombresTotal);

        $establecimiento->setMujeresDiscapacidadFisica($mujeresDiscapacidadFisica);
        $establecimiento->setMujeresDiscapacidadIntelectual($mujeresDiscapacidadIntelectual);
        $establecimiento->setMujeresDiscapacidadSensorial($mujeresDiscapacidadSensorial);
        $establecimiento->setMujeresExtranjeros($mujeresExtranjeros);
        $establecimiento->setMujeresIdiomaExtranjero($mujeresIdiomaExtranjero);
        $establecimiento->setMujeresTituloProfesional($mujeresTituloProfesional);
        $establecimiento->setMujeresTotal($mujeresTotal);

        $establecimiento->setActividadEconomicaSri($actividad_economica_sri);
        $establecimiento->setLocal($local);
        $establecimiento->setNumeroCasa($numeroCasa);
        $establecimiento->setTipoEstablecimiento($tipo_establecimiento);
        $establecimiento->setObligadoContabilidad($contabilidad);
        $establecimiento->setTipoContribuyente($contribuyente);
        $establecimiento->setCallePrincipal($calle_principal);
        $establecimiento->setCalleReferencia($calle_referencia);
        $establecimiento->setCalleInterseccion($calle_interseccion);
        $establecimiento->setTelefonoCelular($celular);
        $establecimiento->setCorreoRuc($email_ruc);
        $establecimiento->setCorreoEstablecimiento($email_establecimiento);
        $establecimiento->setNumeroEstablecimiento($numeroEstablecimiento);
        $establecimiento->setLatitud($latitud);
        $establecimiento->setLongitud($longitud);

        $registro = \DateTime::createFromFormat('Y-m-d', $fecha_registro);
        if(is_bool($registro)){
            $registro = new \DateTime();
        }
        $establecimiento->setFechaRegistro($registro);

        $establecimiento->setPaginaWeb($pagina_web);
        $establecimiento->setNombreComercial($nombre);
        $establecimiento->setRazonSocial($razon_social);
        $establecimiento->setRegistroSiit($registro_siit);
        $establecimiento->setRuc($ruc);
        $establecimiento->setTelefonoFijo($telefono_convencional);

        $establecimiento->setTotalMesas($mesas);
        $establecimiento->setTotalPlazas($plazas);

        $siglasIdiomas = "";
        foreach ($idiomas as $lang){
            $siglasIdiomas .= $lang['sigla'] . ',';
        }

        $siglasIdiomas = rtrim($siglasIdiomas,',');

        $establecimiento->setEstacionamientos($estacionamientos);
        $establecimiento->setIdiomas($siglasIdiomas);
        $establecimiento->setFacturacion($facturacion);
        $establecimiento->setFormapago($formapago);
        $establecimiento->setInternet($internet);
        $establecimiento->setEdificioPatrimonial($edificioPatrimonial);
        $establecimiento->setGeneradorElectrico($generadorElectrico);
        $establecimiento->setExposicionesArte($exposicionesArte);
        $establecimiento->setServicioDomicilio($servicioDomicilio);

        if($contribuyente==2){
            $establecimiento->setNumeroExpedienteSupercias($numeroExpSupercias);
            $establecimiento->setIdentificacionRepresentanteLegal($identRep);
            $establecimiento->setNombreRepresentanteLegal($nombreRep);
            $fechaNombRepLegalDate = \DateTime::createFromFormat('Y-m-d', $fechaNombramientoRep);
            $establecimiento->setFechaNombramientoRepresentanteLegal($fechaNombRepLegalDate);
        }

        $establecimiento->setNombreFranquiciaCadena($nombreFranquiciaCadena);

        try {
            $categoria = $em->find(Categoria::class,$categoriaId['id']);
            $establecimiento->setCategoria($categoria);
            $parroquia = $em->find(Parroquia::class,$parroquiaId['id']);
            $establecimiento->setParroquia($parroquia);

            $certificadosIds = [];
            if(is_array($certificadosParam)){
                foreach ($certificadosParam as $item){
                    $certificadosIds[] = $item['id'];
                }
                $certObjects = $em->getRepository(TipoCertificado::class)->getByIds($certificadosIds);
                foreach ($certObjects as $cert){
                    $establecimiento->addCertificado($cert);
                }
            }

            $em->persist($establecimiento);

            $actItemsIds = [];
            if(is_array($activos_fijos_items)){
                foreach ($activos_fijos_items as $item){
                    $actItemsIds[] = $item['id'];
                }

                $actItemsObjects = $em->getRepository(ActivoFijoItem::class)->getByIds($actItemsIds);

                $cabecera = new CabeceraActivoFijo();
                $cabecera->setAnio($anio_declaracion);
                $cabecera->setTotal($total_activos_fijos);
                $cabecera->setEstablecimiento($establecimiento);
                //todo: falta el anexo de la cabecera
                $em->persist($cabecera);

                $detalleDeclaracion = [];
                /**@var $item ActivoFijoItem**/
                foreach ($actItemsObjects as $item){
                    foreach ($activos_fijos_items as $viewItem){
                        if($viewItem['id']==$item->getId()){
                            $declaracion = new DeclaracionActivoFijo();
                            $declaracion->setValor($viewItem['valor']);
                            $declaracion->setItem($item);
                            $declaracion->setCabecera($cabecera);
//                            $detalleDeclaracion[] = $declaracion;
                            $em->persist($declaracion);
                        }
                    }
                }
            }

            $em->flush();

        }catch (Exception $ex) {
            $code = 500;
            $error = true;
            $message = "An error has occurred trying to get Establecimientos by User - Error: {$ex->getMessage()}";
        }

        $response = [
            'code' => $code,
            'error' => $error,
            'data' => $code == 200 ? $establecimiento : $message,
        ];

        return new Response($serializer->serialize($response, "json"));
    }


    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/v1/establecimientos/{entity}", name="app_establecimientos_get", methods={"GET"})
     */
    public function getEstablecimiento(Request $request,Establecimiento $entity)
    {
        $serializer = $this->get('jms_serializer');
        $em = $this->getDoctrine()->getManager();

        $declaracionObjs = $em->getRepository(DeclaracionActivoFijo::class)
            ->getByEstablecimiento($entity->getId());

        $activosIds = array();

        /**@var $decl DeclaracionActivoFijo**/
        foreach ($declaracionObjs as $decl){
            $activosIds[] = $decl->getItem()->getId();
        }

        $certificados = $em->getRepository(TipoCertificado::class)->getByEstablecimiento($entity->getId());

        $activosFijosItems = $em->getRepository(ActivoFijoItem::class)->getByIds($activosIds);

        $responseActivosFijos = array();
        $anioDeclaracion = 2017;
        foreach ($declaracionObjs as $decl){
            /**@var $item ActivoFijoItem**/
            foreach ($activosFijosItems as $item){
                if($decl->getItem()->getId()==$item->getId()){
                    $anioDeclaracion = $decl->getCabecera()->getAnio();
                    $activo = array(
                        'codigo' => $item->getCodigo(),
                        'id' => $item->getId(),
                        'nombre' => $item->getNombre(),
                        'operando' => $item->getOperando(),
                        'orden' => $item->getOrden(),
                        'tipo_activo' => $item->getTipoActivo(),
                        'tipo_persona' => $item->getTipoPersona(),
                        'valor' => $decl->getValor(),
                    );
                    $responseActivosFijos[]= $activo;
                }
                $activosIds[] = $decl->getItem()->getId();
            }
        }

        $response = [
            'anio_declaracion' => $anioDeclaracion,
            'activos_fijos_items' => $responseActivosFijos,
            'certificados' => $certificados,
            'data' => $entity,
        ];

        return new Response($serializer->serialize($response, "json"));
    }

    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/v1/catalogos/clasificaciones", name="app_clasificaciones", methods={"GET"})
     */
    public function clasificaciones(Request $request)
    {
        $serializer = $this->get('jms_serializer');
        $em = $this->getDoctrine()->getManager();

        $get = $request->query->all();
        $actividad = $get['actividad'];

        $code = 200;
        $error = false;
        $message = "";

        $results = [];

        try {
            $results = $em->getRepository(Clasificacion::class)->getPorActividad((int)$actividad);
        }catch (Exception $ex) {
            $code = 500;
            $error = true;
            $message = "An error has occurred trying to get Clasificaciones by User - Error: {$ex->getMessage()}";
        }

        $response = [
            'code' => $code,
            'error' => $error,
            'data' => $code == 200 ? $results : $message,
        ];

        return new Response($serializer->serialize($response, "json"));
    }

    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/v1/catalogos/categorias", name="app_categorias", methods={"GET"})
     */
    public function categorias(Request $request)
    {
        $serializer = $this->get('jms_serializer');
        $em = $this->getDoctrine()->getManager();

        $get = $request->query->all();
        $clasif = $get['clasificacion'];

        $code = 200;
        $error = false;
        $message = "";

        $results = [];

        try {
            $results = $em->getRepository(Categoria::class)->getPorClasificacion($clasif);
        }catch (Exception $ex) {
            $code = 500;
            $error = true;
            $message = "An error has occurred trying to get Categorias - Error: {$ex->getMessage()}";
        }

        $response = [
            'code' => $code,
            'error' => $error,
            'data' => $code == 200 ? $results : $message,
        ];

        return new Response($serializer->serialize($response, "json"));
    }

    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/v1/catalogos/provincias", name="app_provincias", methods={"GET"})
     */
    public function provincias(Request $request)
    {
        $serializer = $this->get('jms_serializer');
        $em = $this->getDoctrine()->getManager();

        $code = 200;
        $error = false;
        $message = "";

        $results = [];

        try {
            $results = $em->getRepository(Provincia::class)->findAll();
        }catch (Exception $ex) {
            $code = 500;
            $error = true;
            $message = "An error has occurred trying to get Categorias - Error: {$ex->getMessage()}";
        }

        $response = [
            'code' => $code,
            'error' => $error,
            'data' => $code == 200 ? $results : $message,
        ];

        return new Response($serializer->serialize($response, "json"));
    }

    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/v1/catalogos/cantones", name="app_cantones", methods={"GET"})
     */
    public function cantones(Request $request)
    {
        $serializer = $this->get('jms_serializer');
        $em = $this->getDoctrine()->getManager();

        $get = $request->query->all();
        $prov = $get['provincia'];

        $code = 200;
        $error = false;
        $message = "";

        $results = [];

        try {
            $results = $em->getRepository(Canton::class)->getPorProvincia($prov);
        }catch (Exception $ex) {
            $code = 500;
            $error = true;
            $message = "An error has occurred trying to get Cantones - Error: {$ex->getMessage()}";
        }

        $response = [
            'code' => $code,
            'error' => $error,
            'data' => $code == 200 ? $results : $message,
        ];

        return new Response($serializer->serialize($response, "json"));
    }

    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/v1/catalogos/parroquias", name="app_parroquias", methods={"GET"})
     */
    public function parroquias(Request $request)
    {
        $serializer = $this->get('jms_serializer');
        $em = $this->getDoctrine()->getManager();

        $get = $request->query->all();
        $cnt = $get['canton'];

        $code = 200;
        $error = false;
        $message = "";

        $results = [];

        try {
            $results = $em->getRepository(Parroquia::class)->getPorCanton($cnt);
        }catch (Exception $ex) {
            $code = 500;
            $error = true;
            $message = "An error has occurred trying to get Cantones - Error: {$ex->getMessage()}";
        }

        $response = [
            'code' => $code,
            'error' => $error,
            'data' => $code == 200 ? $results : $message,
        ];

        return new Response($serializer->serialize($response, "json"));
    }
    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/v1/catalogos/activos_fijos_items", name="app_activos_fijos_items", methods={"GET"})
     */
    public function activosFijos(Request $request)
    {
        $serializer = $this->get('jms_serializer');
        $em = $this->getDoctrine()->getManager();

        $code = 200;
        $error = false;
        $message = "";

        $results = [];

        try {
            $results = $em->getRepository(ActivoFijoItem::class)->findAll();
        }catch (Exception $ex) {
            $code = 500;
            $error = true;
            $message = "An error has occurred trying to get ActivoFijoItem - Error: {$ex->getMessage()}";
        }

        $response = [
            'code' => $code,
            'error' => $error,
            'data' => $code == 200 ? $results : $message,
        ];

        return new Response($serializer->serialize($response, "json"));
    }

    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/v1/catalogos/categoria_certificados", name="app_categoria_certificados", methods={"GET"})
     */
    public function categoriaCertificados(Request $request)
    {
        $serializer = $this->get('jms_serializer');
        $em = $this->getDoctrine()->getManager();

        $code = 200;
        $error = false;
        $message = "";

        $results = [];

        try {
            $results = $em->getRepository(CategoriaCertificado::class)->findAll();
        }catch (Exception $ex) {
            $code = 500;
            $error = true;
            $message = "An error has occurred trying to get CategoriaCertificados - Error: {$ex->getMessage()}";
        }

        $response = [
            'code' => $code,
            'error' => $error,
            'data' => $code == 200 ? $results : $message,
        ];

        return new Response($serializer->serialize($response, "json"));
    }

    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/v1/catalogos/certificados", name="app_certificados", methods={"GET"})
     */
    public function certificadosByCategoria(Request $request)
    {
        $serializer = $this->get('jms_serializer');
        $em = $this->getDoctrine()->getManager();

        $get = $request->query->all();
        $categoria = $get['categoria'];

        $code = 200;
        $error = false;
        $message = "";

        $results = [];

        try {
            $results = $em->getRepository(TipoCertificado::class)->getPorCategoria((int)$categoria);
        }catch (Exception $ex) {
            $code = 500;
            $error = true;
            $message = "An error has occurred trying to get TipoCertificado by Categoria - Error: {$ex->getMessage()}";
        }

        $response = [
            'code' => $code,
            'error' => $error,
            'data' => $code == 200 ? $results : $message,
        ];

        return new Response($serializer->serialize($response, "json"));
    }
}

<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use JMS\Serializer\Annotation as Serializer;

/**
 * Establecimiento
 *
 * @ORM\Table(name="establecimiento")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EstablecimientoRepository")
 */
class Establecimiento
{
    use TimestampableEntity;
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="ruc", type="string", length=13)
     */
    private $ruc;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $razonSocial;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $actividadEconomicaSri;

    /**
     * @ORM\Column(type="boolean")
     *
     * @var boolean
     */
    private $obligadoContabilidad;

    /**
     * @ORM\Column(type="integer")
     *
     * @var integer
     *
     * 1 persona natural
     * 2 persona juridica
     */
    private $tipoContribuyente;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $numeroExpedienteSupercias;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $identificacionRepresentanteLegal;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     */
    private $nombreRepresentanteLegal;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     *
     * @var \DateTime
     */
    private $fechaNombramientoRepresentanteLegal;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $nombreComercial;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $registroSiit;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=15)
     */
    private $registroSiete;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $fechaRegistro;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $correoRuc;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $correoEstablecimiento;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=3)
     */
    private $numeroEstablecimiento;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nombreFranquiciaCadena;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $paginaWeb;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $telefonoCelular;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $telefonoFijo;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     *
     * 1 propio
     * 2 cedido
     * 3 arrendado
     */
    private $local;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     *
     * 1 NINGUNO
     * 2 FRANQUICIA
     * 3 CADENA
     */
    private $tipoEstablecimiento;

    /**
     * @var Categoria
     *
     * @ORM\ManyToOne(targetEntity="Categoria")
     * @ORM\JoinColumn(name="categoria_id", referencedColumnName="id")
     */
    private $categoria;

    /**
     * @var Parroquia
     *
     * @ORM\ManyToOne(targetEntity="Parroquia")
     * @ORM\JoinColumn(name="parroquia_id", referencedColumnName="id")
     */
    private $parroquia;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $callePrincipal;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $calleReferencia;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $calleInterseccion;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $numeroCasa;

    /**
     * @var float
     *
     * @ORM\Column(name="latitud", type="float", scale=6)
     */
    private $latitud;

    /**
     * @var float
     *
     * @ORM\Column(name="longitud", type="float", scale=6)
     */
    private $longitud;

    /**
     * @ORM\Column(type="integer")
     *
     * @var integer
     *
     */
    private $hombresTotal;

    /**
     * @ORM\Column(type="integer")
     *
     * @var integer
     *
     */
    private $hombresTituloProfesional;

    /**
     * @ORM\Column(type="integer")
     *
     * @var integer
     *
     */
    private $hombresIdiomaExtranjero;

    /**
     * @ORM\Column(type="integer")
     *
     * @var integer
     *
     */
    private $hombresExtranjeros;

    /**
     * @ORM\Column(type="integer")
     *
     * @var integer
     *
     */
    private $hombresDiscapacidadFisica;

    /**
     * @ORM\Column(type="integer")
     *
     * @var integer
     *
     */
    private $hombresDiscapacidadSensorial;

    /**
     * @ORM\Column(type="integer")
     *
     * @var integer
     *
     */
    private $hombresDiscapacidadIntelectual;

    /**
     * @ORM\Column(type="integer")
     *
     * @var integer
     *
     */
    private $mujeresTotal;

    /**
     * @ORM\Column(type="integer")
     *
     * @var integer
     *
     */
    private $mujeresTituloProfesional;

    /**
     * @ORM\Column(type="integer")
     *
     * @var integer
     *
     */
    private $mujeresIdiomaExtranjero;

    /**
     * @ORM\Column(type="integer")
     *
     * @var integer
     *
     */
    private $mujeresExtranjeros;

    /**
     * @ORM\Column(type="integer")
     *
     * @var integer
     *
     */
    private $mujeresDiscapacidadFisica;

    /**
     * @ORM\Column(type="integer")
     *
     * @var integer
     *
     */
    private $mujeresDiscapacidadSensorial;

    /**
     * @ORM\Column(type="integer")
     *
     * @var integer
     *
     */
    private $mujeresDiscapacidadIntelectual;

    /**
     * @ORM\Column(type="integer")
     *
     * @var integer
     *
     */
    private $totalMesas;


    /**
     * @ORM\Column(type="integer")
     *
     * @var integer
     *
     */
    private $totalPlazas;

    /**
     * @ORM\Column(type="integer")
     *
     * @var integer
     *
     */
    private $estacionamientos;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $idiomas;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    private $facturacion;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    private $formapago;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    private $internet;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    private $edificioPatrimonial;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    private $generadorElectrico;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    private $exposicionesArte;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    private $servicioDomicilio;

    /**
     * @var Anexo
     *
     * @ORM\ManyToOne(targetEntity="Anexo")
     * @ORM\JoinColumn(name="imagen_id", referencedColumnName="id")
     */
    private $imagen;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="usuario_id", referencedColumnName="id")
     */
    private $user;

    /**
     *
     * @ORM\ManyToMany(targetEntity="TipoCertificado", inversedBy="users")
     * @ORM\JoinTable(name="establecimientos_certificados")
     */
    private $certificados;

    /**
     * Establecimiento constructor.
     */
    public function __construct()
    {
        $this->certificados = new ArrayCollection();
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getRuc()
    {
        return $this->ruc;
    }

    /**
     * @param string $ruc
     */
    public function setRuc($ruc)
    {
        $this->ruc = $ruc;
    }

    /**
     * @return string
     */
    public function getRazonSocial()
    {
        return $this->razonSocial;
    }

    /**
     * @param string $razonSocial
     */
    public function setRazonSocial($razonSocial)
    {
        $this->razonSocial = $razonSocial;
    }

    /**
     * @return string
     */
    public function getActividadEconomicaSri()
    {
        return $this->actividadEconomicaSri;
    }

    /**
     * @param string $actividadEconomicaSri
     */
    public function setActividadEconomicaSri($actividadEconomicaSri)
    {
        $this->actividadEconomicaSri = $actividadEconomicaSri;
    }

    /**
     * @return bool
     */
    public function isObligadoContabilidad()
    {
        return $this->obligadoContabilidad;
    }

    /**
     * @param bool $obligadoContabilidad
     */
    public function setObligadoContabilidad($obligadoContabilidad)
    {
        $this->obligadoContabilidad = $obligadoContabilidad;
    }

    /**
     * @return int
     */
    public function getTipoContribuyente()
    {
        return $this->tipoContribuyente;
    }

    /**
     * @param int $tipoContribuyente
     */
    public function setTipoContribuyente($tipoContribuyente)
    {
        $this->tipoContribuyente = $tipoContribuyente;
    }

    /**
     * @return string
     */
    public function getNumeroExpedienteSupercias()
    {
        return $this->numeroExpedienteSupercias;
    }

    /**
     * @param string $numeroExpedienteSupercias
     */
    public function setNumeroExpedienteSupercias($numeroExpedienteSupercias)
    {
        $this->numeroExpedienteSupercias = $numeroExpedienteSupercias;
    }

    /**
     * @return string
     */
    public function getIdentificacionRepresentanteLegal()
    {
        return $this->identificacionRepresentanteLegal;
    }

    /**
     * @param string $identificacionRepresentanteLegal
     */
    public function setIdentificacionRepresentanteLegal($identificacionRepresentanteLegal)
    {
        $this->identificacionRepresentanteLegal = $identificacionRepresentanteLegal;
    }

    /**
     * @return string
     */
    public function getNombreRepresentanteLegal()
    {
        return $this->nombreRepresentanteLegal;
    }

    /**
     * @param string $nombreRepresentanteLegal
     */
    public function setNombreRepresentanteLegal($nombreRepresentanteLegal)
    {
        $this->nombreRepresentanteLegal = $nombreRepresentanteLegal;
    }

    /**
     * @return \DateTime
     */
    public function getFechaNombramientoRepresentanteLegal()
    {
        return $this->fechaNombramientoRepresentanteLegal;
    }

    /**
     * @param \DateTime $fechaNombramientoRepresentanteLegal
     */
    public function setFechaNombramientoRepresentanteLegal($fechaNombramientoRepresentanteLegal)
    {
        $this->fechaNombramientoRepresentanteLegal = $fechaNombramientoRepresentanteLegal;
    }

    /**
     * @return string
     */
    public function getNombreComercial()
    {
        return $this->nombreComercial;
    }

    /**
     * @param string $nombreComercial
     */
    public function setNombreComercial($nombreComercial)
    {
        $this->nombreComercial = $nombreComercial;
    }

    /**
     * @return string
     */
    public function getRegistroSiit()
    {
        return $this->registroSiit;
    }

    /**
     * @param string $registroSiit
     */
    public function setRegistroSiit($registroSiit)
    {
        $this->registroSiit = $registroSiit;
    }

    /**
     * @return string
     */
    public function getRegistroSiete()
    {
        return $this->registroSiete;
    }

    /**
     * @param string $registroSiete
     */
    public function setRegistroSiete($registroSiete)
    {
        $this->registroSiete = $registroSiete;
    }

    /**
     * @return \DateTime
     */
    public function getFechaRegistro()
    {
        return $this->fechaRegistro;
    }

    /**
     * @param \DateTime $fechaRegistro
     */
    public function setFechaRegistro($fechaRegistro)
    {
        $this->fechaRegistro = $fechaRegistro;
    }

    /**
     * @return string
     */
    public function getCorreoRuc()
    {
        return $this->correoRuc;
    }

    /**
     * @param string $correoRuc
     */
    public function setCorreoRuc($correoRuc)
    {
        $this->correoRuc = $correoRuc;
    }

    /**
     * @return string
     */
    public function getCorreoEstablecimiento()
    {
        return $this->correoEstablecimiento;
    }

    /**
     * @param string $correoEstablecimiento
     */
    public function setCorreoEstablecimiento($correoEstablecimiento)
    {
        $this->correoEstablecimiento = $correoEstablecimiento;
    }

    /**
     * @return string
     */
    public function getNombreFranquiciaCadena()
    {
        return $this->nombreFranquiciaCadena;
    }

    /**
     * @param string $nombreFranquiciaCadena
     */
    public function setNombreFranquiciaCadena($nombreFranquiciaCadena)
    {
        $this->nombreFranquiciaCadena = $nombreFranquiciaCadena;
    }

    /**
     * @return string
     */
    public function getPaginaWeb()
    {
        return $this->paginaWeb;
    }

    /**
     * @param string $paginaWeb
     */
    public function setPaginaWeb($paginaWeb)
    {
        $this->paginaWeb = $paginaWeb;
    }

    /**
     * @return string
     */
    public function getTelefonoCelular()
    {
        return $this->telefonoCelular;
    }

    /**
     * @param string $telefonoCelular
     */
    public function setTelefonoCelular($telefonoCelular)
    {
        $this->telefonoCelular = $telefonoCelular;
    }

    /**
     * @return string
     */
    public function getTelefonoFijo()
    {
        return $this->telefonoFijo;
    }

    /**
     * @param string $telefonoFijo
     */
    public function setTelefonoFijo($telefonoFijo)
    {
        $this->telefonoFijo = $telefonoFijo;
    }

    /**
     * @return int
     */
    public function getLocal()
    {
        return $this->local;
    }

    /**
     * @param int $local
     */
    public function setLocal($local)
    {
        $this->local = $local;
    }

    /**
     * @return Categoria
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * @param Categoria $categoria
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }

    /**
     * @return Parroquia
     */
    public function getParroquia()
    {
        return $this->parroquia;
    }

    /**
     * @param Parroquia $parroquia
     */
    public function setParroquia($parroquia)
    {
        $this->parroquia = $parroquia;
    }

    /**
     * @return string
     */
    public function getCallePrincipal()
    {
        return $this->callePrincipal;
    }

    /**
     * @param string $callePrincipal
     */
    public function setCallePrincipal($callePrincipal)
    {
        $this->callePrincipal = $callePrincipal;
    }

    /**
     * @return string
     */
    public function getCalleReferencia()
    {
        return $this->calleReferencia;
    }

    /**
     * @param string $calleReferencia
     */
    public function setCalleReferencia($calleReferencia)
    {
        $this->calleReferencia = $calleReferencia;
    }

    /**
     * @return string
     */
    public function getCalleInterseccion()
    {
        return $this->calleInterseccion;
    }

    /**
     * @param string $calleInterseccion
     */
    public function setCalleInterseccion($calleInterseccion)
    {
        $this->calleInterseccion = $calleInterseccion;
    }

    /**
     * @return string
     */
    public function getNumeroCasa()
    {
        return $this->numeroCasa;
    }

    /**
     * @param string $numeroCasa
     */
    public function setNumeroCasa($numeroCasa)
    {
        $this->numeroCasa = $numeroCasa;
    }

    /**
     * @return float
     */
    public function getLatitud()
    {
        return $this->latitud;
    }

    /**
     * @param float $latitud
     */
    public function setLatitud($latitud)
    {
        $this->latitud = $latitud;
    }

    /**
     * @return float
     */
    public function getLongitud()
    {
        return $this->longitud;
    }

    /**
     * @param float $longitud
     */
    public function setLongitud($longitud)
    {
        $this->longitud = $longitud;
    }

    /**
     * @return int
     */
    public function getHombresTotal()
    {
        return $this->hombresTotal;
    }

    /**
     * @param int $hombresTotal
     */
    public function setHombresTotal($hombresTotal)
    {
        $this->hombresTotal = $hombresTotal;
    }

    /**
     * @return int
     */
    public function getHombresTituloProfesional()
    {
        return $this->hombresTituloProfesional;
    }

    /**
     * @param int $hombresTituloProfesional
     */
    public function setHombresTituloProfesional($hombresTituloProfesional)
    {
        $this->hombresTituloProfesional = $hombresTituloProfesional;
    }

    /**
     * @return int
     */
    public function getHombresIdiomaExtranjero()
    {
        return $this->hombresIdiomaExtranjero;
    }

    /**
     * @param int $hombresIdiomaExtranjero
     */
    public function setHombresIdiomaExtranjero($hombresIdiomaExtranjero)
    {
        $this->hombresIdiomaExtranjero = $hombresIdiomaExtranjero;
    }

    /**
     * @return int
     */
    public function getHombresExtranjeros()
    {
        return $this->hombresExtranjeros;
    }

    /**
     * @param int $hombresExtranjeros
     */
    public function setHombresExtranjeros($hombresExtranjeros)
    {
        $this->hombresExtranjeros = $hombresExtranjeros;
    }

    /**
     * @return int
     */
    public function getHombresDiscapacidadFisica()
    {
        return $this->hombresDiscapacidadFisica;
    }

    /**
     * @param int $hombresDiscapacidadFisica
     */
    public function setHombresDiscapacidadFisica($hombresDiscapacidadFisica)
    {
        $this->hombresDiscapacidadFisica = $hombresDiscapacidadFisica;
    }

    /**
     * @return int
     */
    public function getHombresDiscapacidadSensorial()
    {
        return $this->hombresDiscapacidadSensorial;
    }

    /**
     * @param int $hombresDiscapacidadSensorial
     */
    public function setHombresDiscapacidadSensorial($hombresDiscapacidadSensorial)
    {
        $this->hombresDiscapacidadSensorial = $hombresDiscapacidadSensorial;
    }

    /**
     * @return int
     */
    public function getHombresDiscapacidadIntelectual()
    {
        return $this->hombresDiscapacidadIntelectual;
    }

    /**
     * @param int $hombresDiscapacidadIntelectual
     */
    public function setHombresDiscapacidadIntelectual($hombresDiscapacidadIntelectual)
    {
        $this->hombresDiscapacidadIntelectual = $hombresDiscapacidadIntelectual;
    }

    /**
     * @return int
     */
    public function getMujeresTotal()
    {
        return $this->mujeresTotal;
    }

    /**
     * @param int $mujeresTotal
     */
    public function setMujeresTotal($mujeresTotal)
    {
        $this->mujeresTotal = $mujeresTotal;
    }

    /**
     * @return int
     */
    public function getMujeresTituloProfesional()
    {
        return $this->mujeresTituloProfesional;
    }

    /**
     * @param int $mujeresTituloProfesional
     */
    public function setMujeresTituloProfesional($mujeresTituloProfesional)
    {
        $this->mujeresTituloProfesional = $mujeresTituloProfesional;
    }

    /**
     * @return int
     */
    public function getMujeresIdiomaExtranjero()
    {
        return $this->mujeresIdiomaExtranjero;
    }

    /**
     * @param int $mujeresIdiomaExtranjero
     */
    public function setMujeresIdiomaExtranjero($mujeresIdiomaExtranjero)
    {
        $this->mujeresIdiomaExtranjero = $mujeresIdiomaExtranjero;
    }

    /**
     * @return int
     */
    public function getMujeresExtranjeros()
    {
        return $this->mujeresExtranjeros;
    }

    /**
     * @param int $mujeresExtranjeros
     */
    public function setMujeresExtranjeros($mujeresExtranjeros)
    {
        $this->mujeresExtranjeros = $mujeresExtranjeros;
    }

    /**
     * @return int
     */
    public function getMujeresDiscapacidadFisica()
    {
        return $this->mujeresDiscapacidadFisica;
    }

    /**
     * @param int $mujeresDiscapacidadFisica
     */
    public function setMujeresDiscapacidadFisica($mujeresDiscapacidadFisica)
    {
        $this->mujeresDiscapacidadFisica = $mujeresDiscapacidadFisica;
    }

    /**
     * @return int
     */
    public function getMujeresDiscapacidadSensorial()
    {
        return $this->mujeresDiscapacidadSensorial;
    }

    /**
     * @param int $mujeresDiscapacidadSensorial
     */
    public function setMujeresDiscapacidadSensorial($mujeresDiscapacidadSensorial)
    {
        $this->mujeresDiscapacidadSensorial = $mujeresDiscapacidadSensorial;
    }

    /**
     * @return int
     */
    public function getMujeresDiscapacidadIntelectual()
    {
        return $this->mujeresDiscapacidadIntelectual;
    }

    /**
     * @param int $mujeresDiscapacidadIntelectual
     */
    public function setMujeresDiscapacidadIntelectual($mujeresDiscapacidadIntelectual)
    {
        $this->mujeresDiscapacidadIntelectual = $mujeresDiscapacidadIntelectual;
    }

    /**
     * @return mixed
     */
    public function getTotalMesas()
    {
        return $this->totalMesas;
    }

    /**
     * @param mixed $totalMesas
     */
    public function setTotalMesas($totalMesas)
    {
        $this->totalMesas = $totalMesas;
    }

    /**
     * @return mixed
     */
    public function getTotalPlazas()
    {
        return $this->totalPlazas;
    }

    /**
     * @param mixed $totalPlazas
     */
    public function setTotalPlazas($totalPlazas)
    {
        $this->totalPlazas = $totalPlazas;
    }

    /**
     * @return int
     */
    public function getTipoEstablecimiento()
    {
        return $this->tipoEstablecimiento;
    }

    /**
     * @param int $tipoEstablecimiento
     */
    public function setTipoEstablecimiento($tipoEstablecimiento)
    {
        $this->tipoEstablecimiento = $tipoEstablecimiento;
    }

    /**
     * @return mixed
     */
    public function getEstacionamientos()
    {
        return $this->estacionamientos;
    }

    /**
     * @param mixed $estacionamientos
     */
    public function setEstacionamientos($estacionamientos)
    {
        $this->estacionamientos = $estacionamientos;
    }

    /**
     * @return string
     */
    public function getIdiomas()
    {
        return $this->idiomas;
    }

    /**
     * @param string $idiomas
     */
    public function setIdiomas($idiomas)
    {
        $this->idiomas = $idiomas;
    }

    /**
     * @return bool
     */
    public function isFacturacion()
    {
        return $this->facturacion;
    }

    /**
     * @param bool $facturacion
     */
    public function setFacturacion($facturacion)
    {
        $this->facturacion = $facturacion;
    }

    /**
     * @return bool
     */
    public function isFormapago()
    {
        return $this->formapago;
    }

    /**
     * @param bool $formapago
     */
    public function setFormapago($formapago)
    {
        $this->formapago = $formapago;
    }

    /**
     * @return bool
     */
    public function isInternet()
    {
        return $this->internet;
    }

    /**
     * @param bool $internet
     */
    public function setInternet($internet)
    {
        $this->internet = $internet;
    }

    /**
     * @return bool
     */
    public function isEdificioPatrimonial()
    {
        return $this->edificioPatrimonial;
    }

    /**
     * @param bool $edificioPatrimonial
     */
    public function setEdificioPatrimonial($edificioPatrimonial)
    {
        $this->edificioPatrimonial = $edificioPatrimonial;
    }

    /**
     * @return bool
     */
    public function isGeneradorElectrico()
    {
        return $this->generadorElectrico;
    }

    /**
     * @param bool $generadorElectrico
     */
    public function setGeneradorElectrico($generadorElectrico)
    {
        $this->generadorElectrico = $generadorElectrico;
    }

    /**
     * @return bool
     */
    public function isExposicionesArte()
    {
        return $this->exposicionesArte;
    }

    /**
     * @param bool $exposicionesArte
     */
    public function setExposicionesArte($exposicionesArte)
    {
        $this->exposicionesArte = $exposicionesArte;
    }

    /**
     * @return bool
     */
    public function isServicioDomicilio()
    {
        return $this->servicioDomicilio;
    }

    /**
     * @param bool $servicioDomicilio
     */
    public function setServicioDomicilio($servicioDomicilio)
    {
        $this->servicioDomicilio = $servicioDomicilio;
    }

    /**
     * @return Anexo
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * @param Anexo $imagen
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getCertificados()
    {
        return $this->certificados;
    }

    /**
     * @param mixed $certificados
     */
    public function setCertificados($certificados)
    {
        $this->certificados = $certificados;
    }

    public function addCertificado(TipoCertificado $certificado)
    {
//        $certificado->addEstablecimiento($this);
        $this->certificados->add($certificado);

        return $this;
    }

    /**
     * @return string
     */
    public function getNumeroEstablecimiento()
    {
        return $this->numeroEstablecimiento;
    }

    /**
     * @param string $numeroEstablecimiento
     */
    public function setNumeroEstablecimiento($numeroEstablecimiento)
    {
        $this->numeroEstablecimiento = $numeroEstablecimiento;
    }
}


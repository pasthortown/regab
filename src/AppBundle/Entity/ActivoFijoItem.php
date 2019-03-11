<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ActivoFijoItem
 *
 * @ORM\Table(name="activo_fijo_item")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ActivoFijoItemRepository")
 */
class ActivoFijoItem
{
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
     * @ORM\Column(name="codigo", type="string", length=10)
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="operando", type="string", length=5)
     */
    private $operando;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     *
     * T tangible
     * I Intangible
     */
    private $tipoActivo;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     *
     * 1 persona natural
     * 2 persona juridica
     */
    private $tipoPersona;

    /**
     * @var integer
     *
     * @ORM\Column(name="orden", type="integer")
     */
    private $orden;

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
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * @param string $codigo
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    /**
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return string
     */
    public function getTipoActivo()
    {
        return $this->tipoActivo;
    }

    /**
     * @param string $tipoActivo
     */
    public function setTipoActivo($tipoActivo)
    {
        $this->tipoActivo = $tipoActivo;
    }

    /**
     * @return int
     */
    public function getTipoPersona()
    {
        return $this->tipoPersona;
    }

    /**
     * @param int $tipoPersona
     */
    public function setTipoPersona($tipoPersona)
    {
        $this->tipoPersona = $tipoPersona;
    }

    /**
     * @return int
     */
    public function getOrden()
    {
        return $this->orden;
    }

    /**
     * @param int $orden
     */
    public function setOrden($orden)
    {
        $this->orden = $orden;
    }

    /**
     * @return string
     */
    public function getOperando()
    {
        return $this->operando;
    }

    /**
     * @param string $operando
     */
    public function setOperando($operando)
    {
        $this->operando = $operando;
    }

}


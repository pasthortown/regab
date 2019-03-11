<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * TipoCertificado
 *
 * @ORM\Table(name="tipo_certificado")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TipoCertificadoRepository")
 */
class TipoCertificado
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
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var CategoriaCertificado
     *
     * @ORM\ManyToOne(targetEntity="CategoriaCertificado")
     * @ORM\JoinColumn(name="categoria_certificado_id", referencedColumnName="id")
     */
    private $categoria;

    /**
     *
     * @ORM\ManyToMany(targetEntity="Establecimiento", mappedBy="certificados")
     */
    private $establecimientos;

    /**
     * TipoCertificado constructor.
     */
    public function __construct()
    {
        $this->establecimientos = new ArrayCollection();
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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Provincia
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @return CategoriaCertificado
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * @param CategoriaCertificado $categoria
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }

    /**
     * @return mixed
     */
    public function getEstablecimientos()
    {
        return $this->establecimientos;
    }

    /**
     * @param mixed $establecimientos
     */
    public function setEstablecimientos($establecimientos)
    {
        $this->establecimientos = $establecimientos;
    }

    public function addEstablecimiento(Establecimiento $establecimiento)
    {
        $this->establecimientos->add($establecimiento);
    }
}


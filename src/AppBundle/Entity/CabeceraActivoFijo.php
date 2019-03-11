<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * CabeceraActivoFijo
 *
 * @ORM\Table(name="cabecera_activo_fijo")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CabeceraActivoFijoRepository")
 */
class CabeceraActivoFijo
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
     * @var float
     *
     * @ORM\Column(type="float", scale=2)
     */
    private $total;

    /**
     * @var integer
     *
     * @ORM\Column(name="anio", type="integer")
     */
    private $anio;

    /**
     * @var Establecimiento
     *
     * @ORM\ManyToOne(targetEntity="Establecimiento")
     * @ORM\JoinColumn(name="establecimiento_id", referencedColumnName="id")
     */
    private $establecimiento;

    /**
     * @var Anexo
     *
     * @ORM\ManyToOne(targetEntity="Anexo")
     * @ORM\JoinColumn(name="anexo_id", referencedColumnName="id")
     */
    private $anexo;

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
     * @return float
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param float $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }

    /**
     * @return int
     */
    public function getAnio()
    {
        return $this->anio;
    }

    /**
     * @param int $anio
     */
    public function setAnio($anio)
    {
        $this->anio = $anio;
    }

    /**
     * @return Establecimiento
     */
    public function getEstablecimiento()
    {
        return $this->establecimiento;
    }

    /**
     * @param Establecimiento $establecimiento
     */
    public function setEstablecimiento($establecimiento)
    {
        $this->establecimiento = $establecimiento;
    }

    /**
     * @return Anexo
     */
    public function getAnexo()
    {
        return $this->anexo;
    }

    /**
     * @param Anexo $anexo
     */
    public function setAnexo($anexo)
    {
        $this->anexo = $anexo;
    }
}


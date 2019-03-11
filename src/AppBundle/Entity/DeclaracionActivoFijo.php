<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * DeclaracionActivoFijo
 *
 * @ORM\Table(name="declaracion_activo_fijo")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DeclaracionActivoFijoRepository")
 */
class DeclaracionActivoFijo
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
    private $valor;

    /**
     * @var CabeceraActivoFijo
     *
     * @ORM\ManyToOne(targetEntity="CabeceraActivoFijo")
     * @ORM\JoinColumn(name="cabecera_id", referencedColumnName="id")
     */
    private $cabecera;

    /**
     * @var ActivoFijoItem
     *
     * @ORM\ManyToOne(targetEntity="ActivoFijoItem")
     * @ORM\JoinColumn(name="item_id", referencedColumnName="id")
     */
    private $item;

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
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @param float $valor
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    /**
     * @return CabeceraActivoFijo
     */
    public function getCabecera()
    {
        return $this->cabecera;
    }

    /**
     * @param CabeceraActivoFijo $cabecera
     */
    public function setCabecera($cabecera)
    {
        $this->cabecera = $cabecera;
    }

    /**
     * @return ActivoFijoItem
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * @param ActivoFijoItem $item
     */
    public function setItem($item)
    {
        $this->item = $item;
    }

}


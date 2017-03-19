<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * buyClients
 *
 * @ORM\Table(name="a_buy_clients")
 * @ORM\Entity(repositoryClass="UserBundle\Repository\buyClientsRepository")
 */
class buyClients
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
     * @ORM\Column(name="size", type="string", length=50, nullable=true)
     */
    private $size;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=50, nullable=true)
     */
    private $color;

    /**
     * @var int
     *
     * @ORM\Column(name="nid", type="integer")
     */
    private $nid;

    /**
     * @var string
     *
     * @ORM\Column(name="priceone", type="decimal", precision=8, scale=2, nullable=true)
     */
    private $priceone;

    /**
     * @var string
     *
     * @ORM\Column(name="valuta", type="string", length=10, nullable=true)
     */
    private $valuta;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="bagRegister", inversedBy="buyClients")
     */
    protected $bagRegister;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="\AdminBundle\Entity\childrenGoods", inversedBy="buyClients")
     * @ORM\JoinColumn(name="childrenGoods_id", referencedColumnName="id")
     */
    protected $childrenGoods;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set size
     *
     * @param string $size
     * @return byeClients
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return string 
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set color
     *
     * @param string $color
     * @return byeClients
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string 
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set bagRegister
     *
     * @param \UserBundle\Entity\bagRegister $bagRegister
     * @return buyClients
     */
    public function setBagRegister(\UserBundle\Entity\bagRegister $bagRegister = null)
    {
        $this->bagRegister = $bagRegister;

        return $this;
    }

    /**
     * Get bagRegister
     *
     * @return \UserBundle\Entity\bagRegister 
     */
    public function getBagRegister()
    {
        return $this->bagRegister;
    }

    /**
     * Set childrenGoods
     *
     * @param \AdminBundle\Entity\childrenGoods $childrenGoods
     * @return buyClients
     */
    public function setChildrenGoods(\AdminBundle\Entity\childrenGoods $childrenGoods = null)
    {
        $this->childrenGoods = $childrenGoods;

        return $this;
    }

    /**
     * Get childrenGoods
     *
     * @return \AdminBundle\Entity\childrenGoods 
     */
    public function getChildrenGoods()
    {
        return $this->childrenGoods;
    }

    /**
     * Set nid
     *
     * @param integer $nid
     * @return buyClients
     */
    public function setNid($nid)
    {
        $this->nid = $nid;

        return $this;
    }

    /**
     * Get nid
     *
     * @return integer 
     */
    public function getNid()
    {
        return $this->nid;
    }

    /**
     * Set priceone
     *
     * @param string $priceone
     * @return buyClients
     */
    public function setPriceone($priceone)
    {
        $this->priceone = $priceone;

        return $this;
    }

    /**
     * Get priceone
     *
     * @return string 
     */
    public function getPriceone()
    {
        return $this->priceone;
    }

    /**
     * Set valuta
     *
     * @param string $valuta
     * @return buyClients
     */
    public function setValuta($valuta)
    {
        $this->valuta = $valuta;

        return $this;
    }

    /**
     * Get valuta
     *
     * @return string 
     */
    public function getValuta()
    {
        return $this->valuta;
    }
}

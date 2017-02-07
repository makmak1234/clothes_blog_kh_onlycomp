<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * priceGoods
 *
 * @ORM\Table(name="price_goods_a")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\priceGoodsRepository")
 */
class priceGoods
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
     * @ORM\Column(name="rub", type="decimal", precision=8, scale=2, nullable=true)
     */
    private $rub;

    /**
     * @var string
     *
     * @ORM\Column(name="uah", type="decimal", precision=8, scale=2, nullable=true)
     */
    private $uah;

    /**
     * @var string
     *
     * @ORM\Column(name="usd", type="decimal", precision=8, scale=2, nullable=true)
     */
    private $usd;

    /**
     * @var string
     *
     * @ORM\Column(name="eur", type="decimal", precision=8, scale=2, nullable=true)
     */
    private $eur;

    /**
    * @ORM\OneToMany(targetEntity="childrenGoods", mappedBy="priceGoods")
    */
    protected $childrenGoods;

    public function __construct()
    {
        $this->childrenGoods = new ArrayCollection();
    }


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
     * Set rub
     *
     * @param string $rub
     * @return priceGoods
     */
    public function setRub($rub)
    {
        $this->rub = $rub;

        return $this;
    }

    /**
     * Get rub
     *
     * @return string 
     */
    public function getRub()
    {
        return $this->rub;
    }

    /**
     * Set uah
     *
     * @param string $uah
     * @return priceGoods
     */
    public function setUah($uah)
    {
        $this->uah = $uah;

        return $this;
    }

    /**
     * Get uah
     *
     * @return string 
     */
    public function getUah()
    {
        return $this->uah;
    }

    /**
     * Set usd
     *
     * @param string $usd
     * @return priceGoods
     */
    public function setUsd($usd)
    {
        $this->usd = $usd;

        return $this;
    }

    /**
     * Get usd
     *
     * @return string 
     */
    public function getUsd()
    {
        return $this->usd;
    }

    /**
     * Set eur
     *
     * @param string $eur
     * @return priceGoods
     */
    public function setEur($eur)
    {
        $this->eur = $eur;

        return $this;
    }

    /**
     * Get eur
     *
     * @return string 
     */
    public function getEur()
    {
        return $this->eur;
    }

    /**
     * Add childrenGoods
     *
     * @param \AdminBundle\Entity\childrenGoods $childrenGoods
     * @return priceGoods
     */
    public function addChildrenGood(\AdminBundle\Entity\childrenGoods $childrenGoods)
    {
        $this->childrenGoods[] = $childrenGoods;

        return $this;
    }

    /**
     * Remove childrenGoods
     *
     * @param \AdminBundle\Entity\childrenGoods $childrenGoods
     */
    public function removeChildrenGood(\AdminBundle\Entity\childrenGoods $childrenGoods)
    {
        $this->childrenGoods->removeElement($childrenGoods);
    }

    /**
     * Get childrenGoods
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getChildrenGoods()
    {
        return $this->childrenGoods;
    }
}

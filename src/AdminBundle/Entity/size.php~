<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * size
 *
 * @ORM\Table(name="size_a")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\sizeRepository")
 */
class size
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
     * @ORM\Column(name="size", type="string", length=50)
     */
    private $size;

    /**
    * @ORM\OneToMany(targetEntity="childrenGoodsSizeNumber", mappedBy="size")
    */
    protected $childrenGoodsSizeNumber;

    /*
    * @ORM\ManyToMany(targetEntity="childrenGoodsColorNumber", mappedBy="size")
    *
    /
    private $childrenGoodsColorNumber;*/


    /*
     * @var int
     *
     * @ORM\ManyToMany(targetEntity="childrenGoods", mappedBy="size")
     *
     /
    private $childrenGoods; */

    public function __construct()
    {
        $this->childrenGoodsSizeNumber = new ArrayCollection();
        //$this->childrenGoodsColorNumber = new ArrayCollection();
        //$this->childrenGoods = new ArrayCollection();
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
     * Set size
     *
     * @param string $size
     * @return size
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
     * Add childrenGoodsSizeNumber
     *
     * @param \AdminBundle\Entity\childrenGoodsSizeNumber $childrenGoodsSizeNumber
     * @return size
     */
    public function addChildrenGoodsSizeNumber(\AdminBundle\Entity\childrenGoodsSizeNumber $childrenGoodsSizeNumber)
    {
        $this->childrenGoodsSizeNumber[] = $childrenGoodsSizeNumber;

        return $this;
    }

    /**
     * Remove childrenGoodsSizeNumber
     *
     * @param \AdminBundle\Entity\childrenGoodsSizeNumber $childrenGoodsSizeNumber
     */
    public function removeChildrenGoodsSizeNumber(\AdminBundle\Entity\childrenGoodsSizeNumber $childrenGoodsSizeNumber)
    {
        $this->childrenGoodsSizeNumber->removeElement($childrenGoodsSizeNumber);
    }

    /**
     * Get childrenGoodsSizeNumber
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getChildrenGoodsSizeNumber()
    {
        return $this->childrenGoodsSizeNumber;
    }

    /**
     * Add childrenGood
     *
     * @param \AdminBundle\Entity\childrenGoods $childrenGood
     *
     * @return size
     */
    public function addChildrenGood(\AdminBundle\Entity\childrenGoods $childrenGood)
    {
        $this->childrenGoods[] = $childrenGood;

        return $this;
    }

    /**
     * Remove childrenGood
     *
     * @param \AdminBundle\Entity\childrenGoods $childrenGood
     */
    public function removeChildrenGood(\AdminBundle\Entity\childrenGoods $childrenGood)
    {
        $this->childrenGoods->removeElement($childrenGood);
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

    /**
     * Add childrenGoodsColorNumber
     *
     * @param \AdminBundle\Entity\childrenGoodsColorNumber $childrenGoodsColorNumber
     *
     * @return size
     */
    public function addChildrenGoodsColorNumber(\AdminBundle\Entity\childrenGoodsColorNumber $childrenGoodsColorNumber)
    {
        $this->childrenGoodsColorNumber[] = $childrenGoodsColorNumber;

        return $this;
    }

    /**
     * Remove childrenGoodsColorNumber
     *
     * @param \AdminBundle\Entity\childrenGoodsColorNumber $childrenGoodsColorNumber
     */
    public function removeChildrenGoodsColorNumber(\AdminBundle\Entity\childrenGoodsColorNumber $childrenGoodsColorNumber)
    {
        $this->childrenGoodsColorNumber->removeElement($childrenGoodsColorNumber);
    }

    /**
     * Get childrenGoodsColorNumber
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChildrenGoodsColorNumber()
    {
        return $this->childrenGoodsColorNumber;
    }
}

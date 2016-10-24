<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * childrenGoodsSizeNumber
 *
 * @ORM\Table(name="children_goods_size_number_a")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\childrenGoodsSizeNumberRepository")
 */
class childrenGoodsSizeNumber
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
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="childrenGoods", inversedBy="childrenGoodsSizeNumber")
     */
    protected $childrenGoods;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="size", inversedBy="childrenGoodsSizeNumber")
     */
    protected $size;

    /**
    * @ORM\OneToMany(targetEntity="childrenGoodsColorNumber", mappedBy="childrenGoodsSizeNumber")
    */
    protected $childrenGoodsColorNumber;

    public function __construct()
    {
        $this->childrenGoodsColorNumber = new ArrayCollection();
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
     * Set childrenGoods
     *
     * @param \AdminBundle\Entity\childrenGoods $childrenGoods
     * @return childrenGoodsSizeNumber
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
     * Set size
     *
     * @param \AdminBundle\Entity\size $size
     * @return childrenGoodsSizeNumber
     */
    public function setSize(\AdminBundle\Entity\size $size = null)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return \AdminBundle\Entity\size 
     */
    public function getSize()
    {
        return $this->size;
    }

    /*public function __toString()
    {
        return $this->getSize();
    }*/

    /**
     * Add childrenGoodsColorNumber
     *
     * @param \AdminBundle\Entity\childrenGoodsColorNumber $childrenGoodsColorNumber
     * @return childrenGoodsSizeNumber
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

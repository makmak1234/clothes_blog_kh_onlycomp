<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * color
 *
 * @ORM\Table(name="color_a")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\colorRepository")
 */
class color
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
     * @ORM\Column(name="color", type="string", length=50)
     */
    private $color;

    /**
    * @ORM\OneToMany(targetEntity="childrenGoodsColorNumber", mappedBy="color")
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
     * Set color
     *
     * @param string $color
     * @return color
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
     * Add childrenGoodsColorNumber
     *
     * @param \AdminBundle\Entity\childrenGoodsColorNumber $childrenGoodsColorNumber
     * @return color
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

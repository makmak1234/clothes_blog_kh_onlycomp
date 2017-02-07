<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * childrenGoodsColorNumber
 *
 * @ORM\Table(name="children_goods_color_number_a")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\childrenGoodsColorNumberRepository")
 */
class childrenGoodsColorNumber
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
     * @ORM\ManyToOne(targetEntity="childrenGoodsSizeNumber", inversedBy="childrenGoodsColorNumber")
     */
    protected $childrenGoodsSizeNumber;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="color", inversedBy="childrenGoodsColorNumber")
     */
    private $color;

    /**
     * @var int
     *
     * @ORM\Column(name="number", type="integer", nullable=true)
     */
    private $number;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=60, nullable=true)
     */
    private $path;

    /**
     * @ORM\ManyToOne(targetEntity="image", inversedBy="childrenGoodsColorNumber")
     */
    private $image;

    /**
     * @var bool
     *
     * @ORM\Column(name="draft", type="boolean", nullable=true)
     */
    private $draft = false;


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
     * Set number
     *
     * @param integer $number
     * @return childrenGoodsColorNumber
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return integer 
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set path
     *
     * @param string $path
     * @return childrenGoodsColorNumber
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set childrenGoodsSizeNumber
     *
     * @param \AdminBundle\Entity\childrenGoodsSizeNumber $childrenGoodsSizeNumber
     * @return childrenGoodsColorNumber
     */
    public function setChildrenGoodsSizeNumber(\AdminBundle\Entity\childrenGoodsSizeNumber $childrenGoodsSizeNumber = null)
    {
        $this->childrenGoodsSizeNumber = $childrenGoodsSizeNumber;

        return $this;
    }

    /**
     * Get childrenGoodsSizeNumber
     *
     * @return \AdminBundle\Entity\childrenGoodsSizeNumber 
     */
    public function getChildrenGoodsSizeNumber()
    {
        return $this->childrenGoodsSizeNumber;
    }

    /**
     * Set color
     *
     * @param \AdminBundle\Entity\color $color
     * @return childrenGoodsColorNumber
     */
    public function setColor(\AdminBundle\Entity\color $color = null)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return \AdminBundle\Entity\color 
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set image
     *
     * @param \AdminBundle\Entity\image $image
     * @return childrenGoodsColorNumber
     */
    public function setImage(\AdminBundle\Entity\image $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \AdminBundle\Entity\image 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set draft
     *
     * @param boolean $draft
     * @return childrenGoodsColorNumber
     */
    public function setDraft($draft)
    {
        $this->draft = $draft;

        return $this;
    }

    /**
     * Get draft
     *
     * @return boolean 
     */
    public function getDraft()
    {
        return $this->draft;
    }
}

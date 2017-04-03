<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * childrenGoodsCategory
 *
 * @ORM\Table(name="children_goods_category_a")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\childrenGoodsCategoryRepository")
 */
class childrenGoodsCategory
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /*
    * @ORM\OneToMany(targetEntity="childrenGoods", mappedBy="childrenGoodsCategory")
    *
    /
    protected $childrenGoods;*/

    /**
     * @ORM\ManyToOne(targetEntity="image", inversedBy="childrenGoodsCategory")
     */
    protected $image;

    /**
    * @ORM\ManyToMany(targetEntity="childrenGoodsSubcategory", inversedBy="childrenGoodsCategory")
    */
    protected $childrenGoodsSubcategory;

    public function __construct()
    {
        //$this->childrenGoods = new ArrayCollection();
        $this->childrenGoodsSubcategory = new ArrayCollection();
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
     * Set title
     *
     * @param string $title
     * @return childrenGoodsCategory
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set childrenGoodsSubcategory
     *
     * @param \AdminBundle\Entity\childrenGoodsSubcategory $childrenGoodsSubcategory
     * @return childrenGoodsCategory
     */
    public function setChildrenGoodsSubcategory(\AdminBundle\Entity\childrenGoodsSubcategory $childrenGoodsSubcategory = null)
    {
        $this->childrenGoodsSubcategory = $childrenGoodsSubcategory;

        return $this;
    }

    /**
     * Get childrenGoodsSubcategory
     *
     * @return \AdminBundle\Entity\childrenGoodsSubcategory 
     */
    public function getChildrenGoodsSubcategory()
    {
        return $this->childrenGoodsSubcategory;
    }

    /**
     * Add childrenGoodsSubcategory
     *
     * @param \AdminBundle\Entity\childrenGoodsSubcategory $childrenGoodsSubcategory
     * @return childrenGoodsCategory
     */
    public function addChildrenGoodsSubcategory(\AdminBundle\Entity\childrenGoodsSubcategory $childrenGoodsSubcategory)
    {
        $this->childrenGoodsSubcategory[] = $childrenGoodsSubcategory;

        return $this;
    }

    /**
     * Remove childrenGoodsSubcategory
     *
     * @param \AdminBundle\Entity\childrenGoodsSubcategory $childrenGoodsSubcategory
     */
    public function removeChildrenGoodsSubcategory(\AdminBundle\Entity\childrenGoodsSubcategory $childrenGoodsSubcategory)
    {
        $this->childrenGoodsSubcategory->removeElement($childrenGoodsSubcategory);
    }

    /**
     * Set image
     *
     * @param \AdminBundle\Entity\image $image
     * @return childrenGoodsCategory
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
}

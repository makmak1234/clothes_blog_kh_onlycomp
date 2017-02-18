<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * childrenGoodsSubcategory
 *
 * @ORM\Table(name="children_goods_subcategory_a")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\childrenGoodsSubcategoryRepository")
 */
class childrenGoodsSubcategory
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

    //@ORM\OneToMany(targetEntity="childrenGoods", mappedBy="childrenGoodsSubcategory")
    /**
    * @ORM\ManyToMany(targetEntity="childrenGoods", inversedBy="childrenGoodsSubcategory")
    */
    private $childrenGoods;

    /**
     * @var int
     *
     * @ORM\ManyToMany(targetEntity="childrenGoodsCategory", mappedBy="childrenGoodsSubcategory")
     */
    private $childrenGoodsCategory;

    public function __construct()
    {
        $this->childrenGoods = new ArrayCollection();
        $this->childrenGoodsCategory = new ArrayCollection();
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
     * @return childrenGoodsSubcategory
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
     * Add childrenGoods
     *
     * @param \AdminBundle\Entity\childrenGoods $childrenGoods
     * @return childrenGoodsSubcategory
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

    /**
     * Add childrenGoodsCategory
     *
     * @param \AdminBundle\Entity\childrenGoodsCategory $childrenGoodsCategory
     * @return childrenGoodsSubcategory
     */
    public function addChildrenGoodsCategory(\AdminBundle\Entity\childrenGoodsCategory $childrenGoodsCategory)
    {
        $this->childrenGoodsCategory[] = $childrenGoodsCategory;

        return $this;
    }

    /**
     * Remove childrenGoodsCategory
     *
     * @param \AdminBundle\Entity\childrenGoodsCategory $childrenGoodsCategory
     */
    public function removeChildrenGoodsCategory(\AdminBundle\Entity\childrenGoodsCategory $childrenGoodsCategory)
    {
        $this->childrenGoodsCategory->removeElement($childrenGoodsCategory);
    }

    /**
     * Get childrenGoodsCategory
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getChildrenGoodsCategory()
    {
        return $this->childrenGoodsCategory;
    }
}

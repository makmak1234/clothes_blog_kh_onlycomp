<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * descriptionGoods
 *
 * @ORM\Table(name="description_goods_a")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\descriptionGoodsRepository")
 */
class descriptionGoods
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
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
    * @ORM\OneToMany(targetEntity="childrenGoods", mappedBy="descriptionGoods")
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
     * Set description
     *
     * @param string $description
     * @return descriptionGoods
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Add childrenGoods
     *
     * @param \AdminBundle\Entity\childrenGoods $childrenGoods
     * @return descriptionGoods
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

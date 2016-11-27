<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\RedirectResponse;
//use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
//use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * childrenGoods
 *
 * @ORM\Table(name="children_goods_a")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\childrenGoodsRepository")
 * @ORM\HasLifecycleCallbacks
 */
class childrenGoods //extends Controller
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
     * @ORM\ManyToOne(targetEntity="childrenGoodsCategory", inversedBy="childrenGoods")
     */
    protected $childrenGoodsCategory;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="childrenGoodsSubcategory", inversedBy="childrenGoods")
     */
    protected $childrenGoodsSubcategory;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="descriptionGoods", inversedBy="childrenGoods")
     */
    protected $descriptionGoods;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="priceGoods", inversedBy="childrenGoods")
     */
    protected $priceGoods;

    /**
     * @var int
     *
     * @ORM\Column(name="position", type="integer")
     */
    private $position;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="prodDatetime", type="datetime")
     */
    private $prodDatetime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="prodDatetimeUpdate", type="datetime")
     */
    private $prodDatetimeUpdate;

    /**
     * @var bool
     *
     * @ORM\Column(name="draft", type="boolean", nullable=true)
     */
    private $draft = false;

    /**
    * @ORM\OneToMany(targetEntity="childrenGoodsSizeNumber", mappedBy="childrenGoods", cascade={"all"})
    */
    protected $childrenGoodsSizeNumber;

    /**
    * @ORM\OneToMany(targetEntity="\UserBundle\Entity\buyClients", mappedBy="childrenGoods")
    */
    protected $buyClients;

    public function __construct()
    {
        $this->buyClients = new ArrayCollection();
        $this->childrenGoodsSizeNumber = new ArrayCollection();
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
     * @return childrenGoods
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
     * Set position
     *
     * @param integer $position
     * @return childrenGoods
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer 
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set prodDatetime
     *
     * @param \DateTime $prodDatetime
     * @return childrenGoods
     */
    public function setProdDatetime($prodDatetime)
    {
        $this->prodDatetime = $prodDatetime;

        return $this;
    }

    /**
     * Get prodDatetime
     *
     * @return \DateTime 
     */
    public function getProdDatetime()
    {
        return $this->prodDatetime;
    }

    /**
     * Set prodDatetimeUpdate
     *
     * @param \DateTime $prodDatetimeUpdate
     * @return childrenGoods
     */
    public function setProdDatetimeUpdate($prodDatetimeUpdate)
    {
        $this->prodDatetimeUpdate = $prodDatetimeUpdate;

        return $this;
    }

    /**
     * Get prodDatetimeUpdate
     *
     * @return \DateTime 
     */
    public function getProdDatetimeUpdate()
    {
        return $this->prodDatetimeUpdate;
    }

    /**
     * Set childrenGoodsCategory
     *
     * @param \AdminBundle\Entity\childrenGoodsCategory $childrenGoodsCategory
     * @return childrenGoods
     */
    public function setChildrenGoodsCategory(\AdminBundle\Entity\childrenGoodsCategory $childrenGoodsCategory = null)
    {
        $this->childrenGoodsCategory = $childrenGoodsCategory;

        return $this;
    }

    /**
     * Get childrenGoodsCategory
     *
     * @return \AdminBundle\Entity\childrenGoodsCategory 
     */
    public function getChildrenGoodsCategory()
    {
        return $this->childrenGoodsCategory;
    }

    /**
     * Set childrenGoodsSubcategory
     *
     * @param \AdminBundle\Entity\childrenGoodsSubcategory $childrenGoodsSubcategory
     * @return childrenGoods
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
     * Set descriptionGoods
     *
     * @param \AdminBundle\Entity\descriptionGoods $descriptionGoods
     * @return childrenGoods
     */
    public function setDescriptionGoods(\AdminBundle\Entity\descriptionGoods $descriptionGoods = null)
    {
        $this->descriptionGoods = $descriptionGoods;

        return $this;
    }

    /**
     * Get descriptionGoods
     *
     * @return \AdminBundle\Entity\descriptionGoods 
     */
    public function getDescriptionGoods()
    {
        return $this->descriptionGoods;
    }

    /**
     * Set priceGoods
     *
     * @param \AdminBundle\Entity\priceGoods $priceGoods
     * @return childrenGoods
     */
    public function setPriceGoods(\AdminBundle\Entity\priceGoods $priceGoods = null)
    {
        $this->priceGoods = $priceGoods;

        return $this;
    }

    /**
     * Get priceGoods
     *
     * @return \AdminBundle\Entity\priceGoods 
     */
    public function getPriceGoods()
    {
        return $this->priceGoods;
    }

    /**
     * Add childrenGoodsSizeNumber
     *
     * @param \AdminBundle\Entity\childrenGoodsSizeNumber $childrenGoodsSizeNumber
     * @return childrenGoods
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
     * Set draft
     *
     * @param boolean $draft
     * @return childrenGoods
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

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     * @ORM\PostRemove()
     
    public function PostPersistUpdateDelete()
    {
        //return $this->redirectToRoute('calculate_cat_subcat');
        return new RedirectResponse($this->generateUrl('calculate_cat_subcat'));
        //return $this;
    }*/

    /**
     * Add buyClients
     *
     * @param \UserBundle\Entity\buyClients $buyClients
     * @return childrenGoods
     */
    public function addBuyClient(\UserBundle\Entity\buyClients $buyClients)
    {
        $this->buyClients[] = $buyClients;

        return $this;
    }

    /**
     * Remove buyClients
     *
     * @param \UserBundle\Entity\buyClients $buyClients
     */
    public function removeBuyClient(\UserBundle\Entity\buyClients $buyClients)
    {
        $this->buyClients->removeElement($buyClients);
    }

    /**
     * Get buyClients
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBuyClients()
    {
        return $this->buyClients;
    }

    /**
     * Set image
     *
     * @param \AdminBundle\Entity\image $image
     * @return childrenGoods
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

<?php

namespace AdminBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AdminBundle\Entity\childrenGoods;
//use AdminBundle\Entity\childrenGoodsCategory;

class LoadChildrenGoodsData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
	/**
     * @var ContainerInterface
     */
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
    	$fixtureMyService = $this->container->get('fixture.my.serv');
        //$categoryCount = $fixtureMyService->imageLenghtAction('childrenGoodsCategory');
        //$subcategoryCount = $fixtureMyService->imageLenghtAction('childrenGoodsSubcategory');
        $priceCount = $fixtureMyService->imageLenghtAction('priceGoods');
        $descriptionCount = $fixtureMyService->imageLenghtAction('descriptionGoods');

        for ($i = 1; $i <= $descriptionCount ; $i++) { 
        	$childrenGoods = new childrenGoods();
	        $childrenGoods->setTitle('Goods' . $i);
	        $childrenGoods->setPosition($i);

	        //$childrenGoods->setChildrenGoodsCategory($this->getReference('Category' . rand(1, $categoryCount)));//($childrenGoodsCategory);//($repository->findOneByTitle('Category1'));
	        //$childrenGoods->setChildrenGoodsSubcategory($this->getReference('Subcategory' . rand(1, $subcategoryCount)));
	        $childrenGoods->setDescriptionGoods($this->getReference('Description' . $i));
	        $childrenGoods->setPriceGoods($this->getReference('Price' . rand(1, $priceCount)));
	        $childrenGoods->setDraft('1');

	        $childrenGoods->setProdDatetime(new \DateTime('now'));
	        $childrenGoods->setProdDatetimeUpdate(new \DateTime('now'));

	        $manager->persist($childrenGoods);

	        $manager->flush();

	        $this->addReference('ChildrenGoods' . $i, $childrenGoods);
        }
    }

    public function getOrder()
    {
        return 4;
    }
}
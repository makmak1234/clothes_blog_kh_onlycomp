<?php

namespace AdminBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use AdminBundle\Entity\childrenGoods;
//use AdminBundle\Entity\childrenGoodsCategory;

class LoadChildrenGoodsData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 10 ; $i++) { 
        	$childrenGoods = new childrenGoods();
	        $childrenGoods->setTitle('Goods' . $i);
	        $childrenGoods->setPosition($i);

	        //$repository = $this->getDoctrine()->getRepository('AdminBundle:childrenGoodsCategory');
	        $childrenGoods->setChildrenGoodsCategory($this->getReference('Category' . rand(1, 5)));//($childrenGoodsCategory);//($repository->findOneByTitle('Category1'));
	        $childrenGoods->setChildrenGoodsSubcategory($this->getReference('Subcategory' . rand(1, 15)));
	        $childrenGoods->setDescriptionGoods($this->getReference('Description' . $i));
	        $childrenGoods->setPriceGoods($this->getReference('Price' . rand(1, 10)));
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
        return 6;
    }
}
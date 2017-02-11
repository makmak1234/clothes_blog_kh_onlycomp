<?php
namespace AdminBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
//use AdminBundle\Entity\childrenGoods;
use AdminBundle\Entity\childrenGoodsSubcategory;

class LoadChildrenGoodsSubcategoryData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
    	for ($i = 1; $i <= 5; $i++) { 
            $childrenGoodsSubcategory = new childrenGoodsSubcategory();
            $childrenGoodsSubcategory->setTitle('Subcategory' . $i);
            $manager->persist($childrenGoodsSubcategory);
            $manager->flush();
            $this->addReference('Subcategory' . $i, $childrenGoodsSubcategory);
        }
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 2;
    }
}
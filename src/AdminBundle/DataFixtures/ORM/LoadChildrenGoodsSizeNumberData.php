<?php

namespace AdminBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
//use AdminBundle\Entity\childrenGoods;
use AdminBundle\Entity\childrenGoodsSizeNumber;

class LoadChildrenGoodsSizeNumberData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
    	for ($i = 1; $i <= 100; $i++) { 
            $childrenGoodsSizeNumber = new childrenGoodsSizeNumber();
            $childrenGoodsSizeNumber->setChildrenGoods($this->getReference('ChildrenGoods' . rand(1, 10)));
            $childrenGoodsSizeNumber->setSize($this->getReference('Size' . rand(1, 8)));
            $manager->persist($childrenGoodsSizeNumber);
            $manager->flush();
            $this->addReference('ChildrenGoodsSizeNumber' . $i, $childrenGoodsSizeNumber);
        }
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 7;
    }
}
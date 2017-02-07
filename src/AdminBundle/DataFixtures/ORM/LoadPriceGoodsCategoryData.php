<?php

namespace AdminBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
//use AdminBundle\Entity\childrenGoods;
use AdminBundle\Entity\priceGoods;

class LoadpriceGoodsData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
    	for ($i = 1; $i <= 10; $i++) { 
            $priceGoods = new priceGoods();

            $price = $i * 50;
            $priceGoods->setUah($price);
            $priceGoods->setRub($price * 2);
            $priceGoods->setUsd($price / 27);
            $priceGoods->setEur($price / 30);
            $manager->persist($priceGoods);
            $manager->flush();
            $this->addReference('Price' . $i, $priceGoods);
        }
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 4;
    }
}
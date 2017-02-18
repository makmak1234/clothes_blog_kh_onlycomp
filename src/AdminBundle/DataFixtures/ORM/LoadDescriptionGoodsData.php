<?php
namespace AdminBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
//use AdminBundle\Entity\childrenGoods;
use AdminBundle\Entity\descriptionGoods;

class LoadDescriptionGoodsData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
    	for ($i = 1; $i <= 20; $i++) { 
            $descriptionGoods = new descriptionGoods();
            $descriptionGoods->setDescription('Description goods' . $i);
            $manager->persist($descriptionGoods);
            $manager->flush();
            $this->addReference('Description' . $i, $descriptionGoods);
        }
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 1;
    }
}
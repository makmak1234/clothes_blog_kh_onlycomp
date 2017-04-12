<?php

namespace AdminBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
//use AdminBundle\Entity\childrenGoods;
use AdminBundle\Entity\childrenGoodsSizeNumber;

class LoadChildrenGoodsSizeNumberData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
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
        $goodsCount = $fixtureMyService->imageLenghtAction('childrenGoods');
        $sizeCount = $fixtureMyService->imageLenghtAction('size');
        print_r("SizeNumber--------- ");
        print_r("<br>");

        print_r("goodsCount: " . $goodsCount);
        print_r("<br>");
        print_r("sizeCount: " . $sizeCount);
        print_r("<br>");

        $k = 1;
    	for ($i = 1; $i <= 3; $i++) { 
            for ($j = 1; $j <= $goodsCount; $j++) { 
                $childrenGoodsSizeNumber = new childrenGoodsSizeNumber();
                $childrenGoodsSizeNumber->setChildrenGoods($this->getReference('ChildrenGoods' . $j));
                $childrenGoodsSizeNumber->setSize($this->getReference('Size' . rand(1, $sizeCount)));
                $manager->persist($childrenGoodsSizeNumber);
                $manager->flush();
                $this->addReference('ChildrenGoodsSizeNumber' . $k, $childrenGoodsSizeNumber);
                $k++;
            }
        }
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 7;
    }
}
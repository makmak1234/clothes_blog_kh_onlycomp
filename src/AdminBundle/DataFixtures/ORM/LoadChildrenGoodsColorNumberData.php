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
use AdminBundle\Entity\childrenGoodsColorNumber;

class LoadChildrenGoodsColorNumberData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
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
    	for ($i = 1; $i <= 100; $i++) { 
            $childrenGoodsColorNumber = new childrenGoodsColorNumber();
            $childrenGoodsColorNumber->setChildrenGoodsSizeNumber($this->getReference('ChildrenGoodsSizeNumber' . rand(1, 100)));
            $childrenGoodsColorNumber->setColor($this->getReference('Color' . rand(1, 8)));
            $childrenGoodsColorNumber->setNumber(rand(1, 200));
            $childrenGoodsColorNumber->setDraft('1');

            $fixtureMyService = $this->container->get('fixture.my.serv');
            $childrenGoodsSizeNumber = $fixtureMyService->fixtureServiceAction(rand(1, 2));
            //$childrenGoodsSizeNumber = json_decode($childrenGoodsSizeNumber);
            $childrenGoodsColorNumber->setImage($childrenGoodsSizeNumber);

            $manager->persist($childrenGoodsColorNumber);
            $manager->flush();
            //$this->addReference('Category' . $i, $childrenGoodsSizeNumber);
        }

        //$fixtureMyService = $this->container->get('fixture.my.serv');
        //$childrenGoodsSizeNumber = $fixtureMyService->fixtureServiceAction();
        //var_dump($childrenGoodsSizeNumber);

    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 9;
    }
}
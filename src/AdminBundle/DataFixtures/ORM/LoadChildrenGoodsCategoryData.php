<?php

namespace AdminBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
//use AdminBundle\Entity\childrenGoods;
use AdminBundle\Entity\childrenGoodsCategory;

class LoadChildrenGoodsCategoryData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
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
        $imageCount = $fixtureMyService->imageLenghtAction('image');
        var_dump($imageCount);

    	for ($i = 1; $i <= 5; $i++) { 
            $childrenGoodsCategory = new childrenGoodsCategory();
            $childrenGoodsCategory->setTitle('Category' . $i);
            $image = $fixtureMyService->fixtureServiceAction(rand(1, $imageCount), 'image');
            $childrenGoodsCategory->setImage($image);

            $manager->persist($childrenGoodsCategory);
            $manager->flush();
            $this->addReference('Category' . $i, $childrenGoodsCategory);
        }
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 1;
    }
}
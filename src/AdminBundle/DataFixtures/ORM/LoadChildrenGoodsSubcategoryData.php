<?php
namespace AdminBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
//use AdminBundle\Entity\childrenGoods;
use AdminBundle\Entity\childrenGoodsSubcategory;

class LoadChildrenGoodsSubcategoryData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
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
        $childrenGoodsAll = array();
        $childrenGoodsAll[] = 0;
        $fixtureMyService = $this->container->get('fixture.my.serv');
        $goodsCount = $fixtureMyService->imageLenghtAction('childrenGoods');

    	for ($i = 1; $i <= 20; $i++) { 
            $childrenGoodsSubcategory = new childrenGoodsSubcategory();
            $childrenGoodsSubcategory->setTitle('Subcategory' . $i);
            for ($j = 1; $j < 6; $j++) { 
                $childrenGoods = rand(1, $goodsCount);
                if (!in_array($childrenGoods, $childrenGoodsAll)) {
                    $childrenGoodsSubcategory->addChildrenGood($this->getReference('ChildrenGoods' . $childrenGoods));
                }
                $childrenGoodsAll[] = $childrenGoods;
            }
            //unset($childrenGoodsAll);
            //$childrenGoodsAll = array();
            $childrenGoodsAll = null;
            $childrenGoodsAll[] = 0;
            $manager->persist($childrenGoodsSubcategory);
            $manager->flush();
            $this->addReference('Subcategory' . $i, $childrenGoodsSubcategory);
        }
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 5;
    }
}
<?php

namespace AdminBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
//use AdminBundle\Entity\childrenGoods;
use AdminBundle\Entity\size;

class LoadSizeData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $sizeCall  = array();
        $sizeCall[] = 'S';
        $sizeCall[] = 'M';
        $sizeCall[] = 'L';
        $sizeCall[] = 'X';
        $sizeCall[] = 'XS';
        $sizeCall[] = 'XL';
        $sizeCall[] = 'XXL';
        $sizeCall[] = 'XXXL';

    	for ($i = 1; $i <= count($sizeCall); $i++) { 
            $size = new size();
            $size->setSize($sizeCall[$i-1]);
            $manager->persist($size);
            $manager->flush();
            $this->addReference('Size' . $i, $size);
        }
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 5;
    }
}
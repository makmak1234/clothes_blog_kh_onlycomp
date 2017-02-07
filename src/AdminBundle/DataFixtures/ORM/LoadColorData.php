<?php

namespace AdminBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
//use AdminBundle\Entity\childrenGoods;
use AdminBundle\Entity\color;

class LoadColorData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $colorCall  = array();
        $colorCall[] = 'red';
        $colorCall[] = 'green';
        $colorCall[] = 'blue';
        $colorCall[] = 'pink';
        $colorCall[] = 'grey';
        $colorCall[] = 'black';
        $colorCall[] = 'white';
        $colorCall[] = 'yellow';

    	for ($i = 1; $i <= count($colorCall); $i++) { 
            $color = new color();
            $color->setColor($colorCall[$i-1]);
            $manager->persist($color);
            $manager->flush();
            $this->addReference('Color' . $i, $color);
        }
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 8;
    }
}
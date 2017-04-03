<?php

namespace UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AdminBundle\Entity\childrenGoodsSizeNumber;
use AdminBundle\Entity\childrenGoodsCategory;

/**
 * indexUserController controller.
 *
 * 
 */
class fixtureServiceController extends Controller
{
	public $myServiceVar;
	private $entityManager;

	public function __construct($entityManager) {
	    $this->entityManager = $entityManager;
	}

	public function imageLenghtAction($mybundle){
		$em = $this->entityManager;

        $repository = $em->getRepository('AdminBundle:' . $mybundle);
        $image = $repository->findAll();

        $totalCount = $em->getConnection()->query('SELECT FOUND_ROWS()')->fetchColumn(0);

        return $totalCount;
	}

	public function fixtureServiceAction($id, $mybundle)
    {
    	$em = $this->entityManager;

        $repository = $em->getRepository('AdminBundle:' . $mybundle);
        $image = $repository->find($id);
        //var_dump($image->getPath());

    	return $image;
    }

    public function fixtureImageAction()
    {
        $em = $this->entityManager;
        $repository = $em->getRepository('AdminBundle:image');
        $imageAll = $repository->findAll();
        return $imageAll;
    }
}
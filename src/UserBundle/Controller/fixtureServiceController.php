<?php

namespace UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
//use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
//use UserBundle\Entity\bagRegister;
use AdminBundle\Entity\childrenGoodsSizeNumber;
use AdminBundle\Entity\childrenGoodsCategory;
//use AdminBundle\Entity\childrenGoodsSizeNumber;
//use AdminBundle\Form\childrenGoodsType;
//use Symfony\Component\HttpFoundation\Session\Session;

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
    	//print "myServiceAction";
    	//var_dump('');
  
    	$em = $this->entityManager;
		//$em = $this->getDoctrine()->getManager();

        $repository = $em->getRepository('AdminBundle:' . $mybundle);
        $image = $repository->find($id);
        //var_dump($image->getPath());

    	//return json_encode($image);
    	return $image;
    }
}
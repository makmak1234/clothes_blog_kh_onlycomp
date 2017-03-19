<?php

namespace UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
//use UserBundle\Entity\bagRegister;
use AdminBundle\Entity\childrenGoods;
//use AdminBundle\Entity\childrenGoodsCategory;
//use AdminBundle\Entity\childrenGoodsSizeNumber;
//use AdminBundle\Form\childrenGoodsType;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * indexUserController controller.
 *
 * 
 */
class myServiceController extends Controller
{
	public $myServiceVar;

	public function myServiceAction()
    {
    	//print "myServiceAction";
    	//var_dump('');
    	$this->myServiceVar = "myServiceVar";
    	$myServiceVar1 = "myServiceVar1";

    	return json_encode(array(1 => $this->myServiceVar, 2 => $myServiceVar1));
    }
}

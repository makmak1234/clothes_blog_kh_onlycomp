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
class ajaxUserController extends Controller
{

    /**
     * Lists all childrenGoods entities.
     *
     * @Route("/ajax_bag_user/{id}", name="ajax_bag_user", requirements={"id": ".*\d+"})
     * @Method("GET")
     */
    public function ajaxBagUserAction($id, $bagreg = true, Request $request)
    {

        $ajaxUserServ = $this->get('ajax.user.serv');

        $size = $request->query->get('size');
        if ($size == null) {
        	$size = 0;
        }

        $color = $request->query->get('color');
        if ($color == null) {
        	$color = 0;
        }

        $ajaxUserServ->ajaxBagUserServAction($id, $size, $color, $bagreg, $request);

    	return $this->render('UserBundle::bigBag.html.twig', array(
            'childrenGoods' => $ajaxUserServ->getChildrenGoods(),
            'id' => $id,
            'idarr' => $ajaxUserServ->getIdarr(),
            'sizearr' => $ajaxUserServ->getSizearr(),
            'colorarr' => $ajaxUserServ->getColorarr(),
            'priceone' => $ajaxUserServ->getPriceone(),
            'priceall' => $ajaxUserServ->getPriceall(),
            'bigBagDisp' => $ajaxUserServ->getBigBagDisp(),
            'nid' => $ajaxUserServ->getNid(),
            'sizeTitle' => $ajaxUserServ->getSizeTitle(),
            'colorTitle' => $ajaxUserServ->getColorTitle(),
            //'color' => $color,
            //'color' => $color,
        ));
    }

    /**
     * Lists all childrenGoods entities.
     *
     * @Route("/ajax_checkout_user/{id}", name="ajax_checkout_user", requirements={"id": ".*\d+"})
     * @Method("GET")
     */
    public function ajaxCheckoutUserAction($id, $bagreg = true, Request $request)
    {
        $sourcePath = array();

        $ajaxUserServ = $this->get('ajax.user.serv');

        $size = $request->query->get('size');
        if ($size == null) {
        	$size = 0;
        }

        $color = $request->query->get('color');
        if ($color == null) {
        	$color = 0;
        }

        $ajaxUserServ->ajaxBagUserServAction($id, $size, $color, $bagreg, $request);

        $cacheManager = $this->container->get('liip_imagine.cache.manager');

        foreach($ajaxUserServ->getPathImages() as $indImag => $pathImag){
            $pathImg = '/uploads/documents/' . $pathImag;
            $sourcePath[] = $cacheManager->getBrowserPath($pathImg, 'my_thumb_cart');
        }

    	return $this->render('UserBundle::checkoutBag.html.twig', array(
            'childrenGoods' => $ajaxUserServ->getChildrenGoods(),
            'id' => $id,
            'idarr' => $ajaxUserServ->getIdarr(),
            'sizearr' => $ajaxUserServ->getSizearr(),
            'colorarr' => $ajaxUserServ->getColorarr(),
            'priceone' => $ajaxUserServ->getPriceone(),
            'priceall' => $ajaxUserServ->getPriceall(),
            'bigBagDisp' => $ajaxUserServ->getBigBagDisp(),
            'nid' => $ajaxUserServ->getNid(),
            'sizeTitle' => $ajaxUserServ->getSizeTitle(),
            'colorTitle' => $ajaxUserServ->getColorTitle(),
            'sourcePath' => $sourcePath,//$ajaxUserServ->getPathImages(),
        ));
    }

    /**
     * Lists all childrenGoods entities.
     *
     * @Route("/basket_big_change", name="basket_big_change")
     * @Method("GET")
     */
    public function basketBigChangeAction(Request $request)
    {

    	$session = $request->getSession();
    	
	    //$nidaj = $foo_mysgli->sanitizeString($_GET["nidaj"]);
	    $nidaj = $request->query->get('nidaj');

		//$k = $foo_mysgli->sanitizeString($_GET["kg2"]);
		$k = $request->query->get('kg2');

		//$nid = $_SESSION["nid"];
		$nid = $session->get('nid');

		$nid[$k] = $nidaj;


		//array_splice($nid, 0, 1);
		//$_SESSION["nid"] = $nid;
		$session->set('nid', $nid);

		//echo "snid: $nid[$k]";

		return new Response();
	}

}
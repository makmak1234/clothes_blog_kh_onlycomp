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
        ));

    }

}
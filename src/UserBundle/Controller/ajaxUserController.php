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
     * @Route("/ajax_bag_user/{id}", name="ajax_bag_user", requirements={"id": "\d+"})
     * @Method("GET")
     */
    public function ajaxBagUserAction($id)
    {
    	/*//session_start();
    	$session = $request->getSession();

		//require_once 'login.php';//02.11.15
		session_set_cookie_params('','/','m.'.$dircook);//m.pajamas.esy.es

		//require_once 'login.php';//02.11.15

		$idarr = array();
		$nid = array();
		$priceall = 0;
		$bigBagDisp = 'none';

		if(isset($_SESSION["idbasketsmall"])){
			//$idarr = $_SESSION["idbasketsmall"];
			$idarr = $session->get('idbasketsmall');
			//$nid = $_SESSION["nid"];
			$nid = $session->get('nid');
		}

		if(isset($_GET["id"])){
			//$id = $foo_mysgli->sanitizeString($_GET["id"]); //получили из js
		
			//$clearone = $foo_mysgli->sanitizeString($_GET["mclon"]);
			$clearone = $mclon;
			
				if(in_array($id, $idarr)){//наличие значения в массиве
					foreach($idarr as $k=>$v){
						if($v == $id){
							if($clearone == 'FALSE'){
								$nid[$k]++;
							}
							else{
								array_splice($idarr, $k, 1);
								array_splice($nid, $k, 1);
							}
						}	
					}
				}
				else{
					$idarr[] = $id;
					$nid[] = 1;
				}
			if(count($idarr) == 0) $id= -1;	
		}

		//echo "sid = $id ";
		if (!($id == -1)){
			//require_once "bassmallunated.php";
			$bigBagDisp = 'block';

			//$_SESSION["idbasketsmall"] = $idarr;
			$session->set('idbasketsmall', $idarr);
			//$_SESSION["nid"] = $nid;
			$session->set('nid', $nid);
		}
		else{
			//destroy_session_and_data();
			$session-> invalidate();
		}*/

    	return new Response($id);
    }
}
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
    public function ajaxBagUserAction(Request $request, $id, $mclon)
    {
    	//session_start();
    	$session = $request->getSession();

		//require_once 'login.php';//02.11.15
		//session_set_cookie_params('','/','m.'.$dircook);//m.pajamas.esy.es

		//require_once 'login.php';//02.11.15

		$idarr = array();
		$nid = array();
		$priceall = 0;
		$bigBagDisp = 'none';
		$childrenGoods = array();
		$priceone = array();

		if($session->get('idbasketsmall') != null){//
			//$idarr = $_SESSION["idbasketsmall"];
			$idarr = $session->get('idbasketsmall');
			//$nid = $_SESSION["nid"];
			$nid = $session->get('nid');
			$bigBagDisp = 'block';
		}

		print "idarr first";
        var_dump($idarr);
        print "id ";
        var_dump($id);

		if($id > 0){ //if(isset($_GET["id"])){
			//$id = $foo_mysgli->sanitizeString($_GET["id"]); //получили из js
		
			//$clearone = $foo_mysgli->sanitizeString($_GET["mclon"]);
			$clearone = $request->query->get('mclon');//$mclon;
			$bigBagDisp = 'block';
			if(in_array($id, $idarr)){//наличие значения в массиве
				foreach($idarr as $k=>$v){
					if($v == $id){
						print "clearone ";
    					var_dump($clearone);
						if($clearone == 'false'){
							$nid[$k]++;
						}
						else{
							array_splice($idarr, $k, 1);//;unset($idarr[$k])
							array_splice($nid, $k, 1);//;unset($nid[$k])
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
			//$bigBagDisp = 'block';

			//$_SESSION["idbasketsmall"] = $idarr;
			$session->set('idbasketsmall', $idarr);
			//$_SESSION["nid"] = $nid;
			$session->set('nid', $nid);

			$em = $this->getDoctrine()->getManager();

        	$repository = $em->getRepository('AdminBundle:childrenGoods');

			foreach ($idarr as $key => $value) {
	        	$query = $repository->find($value);
	        	$childrenGoods[] = $query;
	        }
	        //$childrenGoods = $query->getResult();

	        //$query = $repository->findBy($idarr1);

	        foreach($idarr as $k=>$v){
				//$id = $v;
				$n = $nid[$k];
				//$query = "SELECT * FROM pajamas1 WHERE id='$id'";
				//$result = $foo_mysgli->mysql_query($query);
				//$row = $foo_mysgli->mysql_fetch_row($result);
				$row = $childrenGoods[$k]->getPriceGoods()->getRub();
				$priceone[$k] = $row * $n;
				$priceall += $priceone[$k];
			}

			print "idarr session";
        	var_dump($session->get('idbasketsmall'));
		}
		else{
			//destroy_session_and_data();
			$session-> invalidate();
			$bigBagDisp = 'none';
		}

        print "idarr ";
        var_dump($idarr);
        print "nid ";
        var_dump($nid);

    	return $this->render('UserBundle::bigBag.html.twig', array(
            'childrenGoods' => $childrenGoods,
            'id' => $id,
            'idarr' => $idarr,
            'priceone' => $priceone,
            'priceall' => $priceall,
            'bigBagDisp' => $bigBagDisp,
            'nid' => $nid,
        ));

        /*return new Response(
            '<b>Lucky number: <b>'
        );*/
    }
}
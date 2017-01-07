<?php

namespace UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
//use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
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
class ajaxUserServController extends Controller
{
	private $idarr = array();
	private $sizearr = array();
	private $colorarr = array();
	private $nid = array();
	private $nidAll = 0;
	private $priceall = 0;
	private $bigBagDisp = 'none';
	private $childrenGoods = array();
	private $priceone = array();
	private $entityManager;
	private $sizeTitle = array();
	private $colorTitle = array();
	private $pathImages = array();

	//private $id;
	//private $bagreg;

    public function __construct($entityManager) {
	    $this->entityManager = $entityManager;
	}

    public function ajaxBagUserServAction($id, $size = '0', $color = '0', $bagreg, $request)
    {
    	//$request = $this->request;
    	$flag = false;

		/*print "bagreg ";
        var_dump($bagreg); print "<br>";

        print "mclon before sesstart";
        var_dump($request->query->get('mclon')); print "<br>";

        print "id: ";
        var_dump($id); print "<br>";
        print "size: ";
        var_dump($size); print "<br>";
        print "color: ";
        var_dump($color); print "<br>";*/
        
    	//session_start();
    	//if($bagreg == null){
    		$session = $request->getSession();
    	//}
        
        //print "mclon after sesstart";
        //var_dump($request->query->get('mclon')); print "<br>";
    	

		//require_once 'login.php';//02.11.15
		//session_set_cookie_params('','/','m.'.$dircook);//m.pajamas.esy.es

		//require_once 'login.php';//02.11.15

		if($session->get('idbasketsmall') != null){//
			//$idarr = $_SESSION["idbasketsmall"];
			$this->idarr = $session->get('idbasketsmall');
			$this->sizearr = $session->get('sizearr');
			$this->colorarr = $session->get('colorarr');
			//$nid = $_SESSION["nid"];
			$this->nid = $session->get('nid');
			$this->bigBagDisp = 'block';
		}

		/*print "idarr first";
        var_dump($this->idarr); print "<br>";
        print "id ";
        var_dump($id); print "<br>";
        print "sizearr: ";
        var_dump($this->sizearr); print "<br>";
        print "colorarr: ";
        var_dump($this->colorarr); print "<br>";*/

		if($id > 0){ //if(isset($_GET["id"])){
			//$id = $foo_mysgli->sanitizeString($_GET["id"]); //получили из js
		
			//$clearone = $foo_mysgli->sanitizeString($_GET["mclon"]);
			$clearone = $request->query->get('mclon');//$mclon;
			$this->bigBagDisp = 'block';
			//if(in_array($id, $this->idarr) && in_array($size, $this->sizearr) && in_array($color, $this->colorarr)){//наличие значения в массиве
				if($bagreg == true){
					foreach($this->idarr as $k=>$v){
						//print "k: ";
        				//var_dump($k); print "<br>";
						if($v == $id && $this->sizearr[$k] == $size  && $this->colorarr[$k] == $color){
							$flag = true;
							//print "clearone ";
	    					//var_dump($clearone);
    						if($clearone == 'false'){
								$this->nid[$k]++;
							}
							else{
									array_splice($this->idarr, $k, 1);//;unset($idarr[$k])
									array_splice($this->sizearr, $k, 1);
									array_splice($this->colorarr, $k, 1);
									array_splice($this->nid, $k, 1);//;unset($nid[$k])
									break;
							}
						}	
					}
					if (!$flag) {
						$this->idarr[] = $id;
						$this->sizearr[] = $size;
						$this->colorarr[] = $color;
						$this->nid[] = 1;
					}
				}
			//}
			/*else{
				$this->idarr[] = $id;
				$this->sizearr[] = $size;
				$this->colorarr[] = $color;
				$this->nid[] = 1;
			}*/

			if(count($this->idarr) == 0) $id= -1;	
		}

		//echo "sid = $id ";
		if (!($id == -1)){
			//require_once "bassmallunated.php";
			//$bigBagDisp = 'block';

			//$_SESSION["idbasketsmall"] = $idarr;
			$session->set('idbasketsmall', $this->idarr);
			$session->set('sizearr', $this->sizearr);
			$session->set('colorarr', $this->colorarr);
			//$_SESSION["nid"] = $nid;
			$session->set('nid', $this->nid);

			$em = $this->entityManager;
			//$em = $this->getDoctrine()->getManager();

        	$repository = $em->getRepository('AdminBundle:childrenGoods');

			foreach ($this->idarr as $key => $value) {
	        	$query = $repository->find($value);
	        	$this->childrenGoods[] = $query;
	        }
	        //$childrenGoods = $query->getResult();

	        //$query = $repository->findBy($idarr1);

	        foreach($this->idarr as $k=>$v){
				//$id = $v;
				$n = $this->nid[$k];
				//$query = "SELECT * FROM pajamas1 WHERE id='$id'";
				//$result = $foo_mysgli->mysql_query($query);
				//$row = $foo_mysgli->mysql_fetch_row($result);
				$row = $this->childrenGoods[$k]->getPriceGoods()->getRub();
				$this->priceone[$k] = $row * $n;
				$this->priceall += $this->priceone[$k];
				$this->nidAll += $n;

				
				if ($this->sizearr[$k] != 'undefined') {
					$this->sizeTitle[$k] = $this->childrenGoods[$k]->getChildrenGoodsSizeNumber()->get($this->sizearr[$k])->getSize()->getSize();
				}
				else{
					$this->sizeTitle[$k] = '';
				}
				

				if ($this->colorarr[$k] != 'undefined') {
					$this->colorTitle[$k] = $this->childrenGoods[$k]->getChildrenGoodsSizeNumber()->get($this->sizearr[$k])->getChildrenGoodsColorNumber()->get($this->colorarr[$k])->getColor()->getColor();
					$this->pathImages[$k] = $this->childrenGoods[$k]->getChildrenGoodsSizeNumber()->get($this->sizearr[$k])->getChildrenGoodsColorNumber()->get($this->colorarr[$k])->getImage()->getPath();
				}
				else{
					$this->colorTitle[$k] = '';
					$this->pathImages[$k] = '';
				}
			}

			//print "idarr session";
        	//var_dump($session->get('idbasketsmall')); print "<br>";
		}
		else{
			//destroy_session_and_data();
			$session-> invalidate();
			$this->bigBagDisp = 'none';
		}

		$this->size = $size;
		$this->color = $color;

       /* print "idarr ";
        var_dump($this->idarr); print "<br>";
        print "nid ";
        var_dump($this->nid); print "<br>";*/

    }

    public function getIdarr(){
    	return $this->idarr;
    }

    public function getSizearr(){
    	return $this->sizearr;
    }

    public function getColorarr(){
    	return $this->colorarr;
    }

    public function getNid(){
    	return $this->nid;
    }

    public function getNidAll(){
    	return $this->nidAll;
    }

    public function getPriceall(){
    	return $this->priceall;
    }

    public function getBigBagDisp(){
    	return $this->bigBagDisp;
    }

    public function getChildrenGoods(){
    	return $this->childrenGoods;
    }

    public function getPriceone(){
    	return $this->priceone;
    }

	public function getSizeTitle(){
    	return $this->sizeTitle;
    }

    public function getColorTitle(){
    	return $this->colorTitle;
    }

    public function getPathImages(){
    	return $this->pathImages;
    }

    /*public function setId($id){
    	$this->id = $id;
    }

    public function setBagreg($bagreg){
    	$this->bagreg = $bagreg;
    }*/
}
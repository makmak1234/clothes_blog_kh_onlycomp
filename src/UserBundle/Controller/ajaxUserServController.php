<?php

namespace UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AdminBundle\Entity\childrenGoods;
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

    public function __construct($entityManager) {
	    $this->entityManager = $entityManager;
	}

    public function ajaxBagUserServAction($id, $size = '0', $color = '0', $bagreg, $request)
    {
    	$flag = false;
        
    	$session = $request->getSession();
        
		if($session->get('idbasketsmall') != null){//
			$this->idarr = $session->get('idbasketsmall');
			$this->sizearr = $session->get('sizearr');
			$this->colorarr = $session->get('colorarr');
			$this->nid = $session->get('nid');
			$this->bigBagDisp = 'block';
		}

		if($id > 0){ //if(isset($_GET["id"])){
			$clearone = $request->query->get('mclon');//$mclon;
			$this->bigBagDisp = 'block';
			//наличие значения в массиве
				if($bagreg == true){
					foreach($this->idarr as $k=>$v){
						if($v == $id && $this->sizearr[$k] == $size  && $this->colorarr[$k] == $color){
							$flag = true;
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

			if(count($this->idarr) == 0) $id= -1;	
		}

		if (!($id == -1)){
			$session->set('idbasketsmall', $this->idarr);
			$session->set('sizearr', $this->sizearr);
			$session->set('colorarr', $this->colorarr);
			$session->set('nid', $this->nid);

			$em = $this->entityManager;

        	$repository = $em->getRepository('AdminBundle:childrenGoods');

			foreach ($this->idarr as $key => $value) {
	        	$query = $repository->find($value);
	        	$this->childrenGoods[] = $query;
	        }
	    
	        foreach($this->idarr as $k=>$v){
				$n = $this->nid[$k];
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
		}
		else{
			//destroy_session_and_data();
			$session-> invalidate();
			$this->bigBagDisp = 'none';
		}
		$this->size = $size;
		$this->color = $color;
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

}
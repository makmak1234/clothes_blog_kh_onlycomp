<?php

namespace AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//use Sonata\AdminBundle\Controller\CRUDController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AdminBundle\Entity\childrenGoods;
use AdminBundle\Entity\childrenGoodsSizeNumber;
use AdminBundle\Form\childrenGoodsType;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * childrenGoods controller.
 *
 * @Route("/childrengoods")
 */
class childrenGoodsController extends Controller
{
    /**
     * Lists all childrenGoods entities.
     *
     * @Route("/", name="childrengoods_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $childrenGoods = $em->getRepository('AdminBundle:childrenGoods')->findAll();

        return $this->render('childrengoods/index.html.twig', array(
            'childrenGoods' => $childrenGoods,
        ));
    }

    /**
     * Creates a new childrenGoods entity.
     *
     * @Route("/new", name="childrengoods_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $session = new Session();

        $childrenGood = new childrenGoods();
        $childrenGoodPer = new childrenGoods();

        $childrenGoodsSizeNumber = new childrenGoodsSizeNumber();

        $childrenGoodSession = "nety";
        if($session->get('childrenGood') != null){
            $childrenGoodSession = $session->get('childrenGood');
            $childrenGood->setTitle($childrenGoodSession->getTitle());
            $childrenGood->setPosition($childrenGoodSession->getPosition());
            $childrenGood->setProdDatetime($childrenGoodSession->getProdDatetime());
            $childrenGood->setProdDatetimeUpdate($childrenGoodSession->getProdDatetimeUpdate());
            //$admin_childrenGood->getChildrenGoodsSizeNumber()->get(0)->getSizegoods()->getSize();
            $session-> invalidate();
        }
        else{
            $childrenGood->setProdDatetime(new \DateTime('tomorrow'));
            $childrenGood->setProdDatetimeUpdate(new \DateTime('tomorrow'));
        }

        /*$tag1 = new Tag();
        $tag1->setName('tag1');
        $task->getTags()->add($tag1);
        $tag2 = new Tag();
        $tag2->setName('tag2');
        $task->getTags()->add($tag2);

        $em = $this->getDoctrine()->getManager();

        $size = $em->getRepository('AdminBundle:size')->findAll();*/

        $form = $this->createForm('AdminBundle\Form\childrenGoodsType', $childrenGood);
        $form->handleRequest($request);

        $formSizeNumber = $this->createForm('AdminBundle\Form\childrenGoodsSizeNumberType', $childrenGoodsSizeNumber);
        $formSizeNumber->handleRequest($request);

        if ($form->isSubmitted()) {
            if($_POST["add_new_cat"] == 'true'){
                //$add_new_cat = $_POST["add_new_cat"];
                $session->set('childrenGood', $childrenGood);
                //$session->set('childrenGoodId', $childrenGood);
                return $this->redirectToRoute('childrengoodscategory_new'//, 
                    /*array('id' => $childrenGood->getId(),
                        'add_new_cat' => $add_new_cat,
                        )*/
                        );
            }

            //return $this->redirectToRoute('childrengoods_show', 
            //        array('id' => 1,));

            //$childrenGoodMy = $_POST["children_goods"];
            //$childrenGoodPer->setTitle($childrenGoodMy['priceGoods']);
            //$childrenGoodPer->setPosition($childrenGoodMy['position']);
            //$childrenGoodPer->setProdDatetime($childrenGoodMy['prodDatetime']);
            //$childrenGoodPer->setProdDatetimeUpdate($childrenGoodMy['prodDatetimeUpdate']['date']);
            //$childrenGoodPer->setProdDatetime(new \DateTime('tomorrow'));
            //$childrenGoodPer->setProdDatetimeUpdate(new \DateTime('tomorrow'));

            //$em = $this->getDoctrine()->getManager();
            //$em->persist($childrenGoodPer);
            //$em->flush();
            //$childrenGoodsPer = $em->getRepository('AdminBundle:childrenGoods')->findAll();

            //$childrenGoodId = $childrenGoodPer->getId();

            /*foreach ($childrenGoodMy['childrenGoodsSizeNumber'] as $key => $value) {
                $childrenGoodsSizeNumberMy = new childrenGoodsSizeNumber();
                $childrenGoodsSizeNumberMy -> setChildrenGoods($value);
            }*/

            //return $this->render('childrengoods/myshow.html.twig', array(
              //  'childrenGood' => $childrenGood,
                //'childrenGoodMy' => $childrenGoodMy,
                //'childrenGoodId' => $childrenGoodId,
                //'childrenGoodPer' => $childrenGoodPer,
            //));

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($childrenGood);
                $em->flush();

                return $this->redirectToRoute('childrengoods_show', 
                    array('id' => $childrenGood->getId(),
                        //'add_new_cat' => $add_new_cat,
                        ));
            }
        }

        return $this->render('childrengoods/new.html.twig', array(
            'childrenGood' => $childrenGood,
            'form' => $form->createView(),
            'formSizeNumber' => $formSizeNumber->createView(),
            'childrenGoodSession' => $childrenGoodSession,
        ));
    }

    /**
     * Finds and displays a childrenGoods entity.
     *
     * @Route("/{id}", name="childrengoods_show")
     * @Method("GET")
     */
    public function showAction(childrenGoods $childrenGood, Request $request)
    {
        /*$add_new_cat = 'nety';
        if(isset($_GET["add_new_cat"])){
                //$add_new_cat = $_GET["add_new_cat"];
                $add_new_cat = $request->query->get('add_new_cat');
            }*/
        

        $deleteForm = $this->createDeleteForm($childrenGood);

        return $this->render('childrengoods/show.html.twig', array(
            'childrenGood' => $childrenGood,
            'delete_form' => $deleteForm->createView(),
            //s'add_new_cat' => $add_new_cat,
        ));
    }

    /**
     * Displays a form to edit an existing childrenGoods entity.
     *
     * @Route("/{id}/edit", name="childrengoods_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, childrenGoods $childrenGood)
    {
        $deleteForm = $this->createDeleteForm($childrenGood);
        $editForm = $this->createForm('AdminBundle\Form\childrenGoodsType', $childrenGood);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($childrenGood);
            $em->flush();

            return $this->redirectToRoute('childrengoods_edit', array('id' => $childrenGood->getId()));
        }

        return $this->render('childrengoods/edit.html.twig', array(
            'childrenGood' => $childrenGood,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a childrenGoods entity.
     *
     * @Route("/{id}", name="childrengoods_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, childrenGoods $childrenGood)
    {
        $form = $this->createDeleteForm($childrenGood);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($childrenGood);
            $em->flush();
        }

        return $this->redirectToRoute('childrengoods_index');
    }

    /**
     * Creates a form to delete a childrenGoods entity.
     *
     * @param childrenGoods $childrenGood The childrenGoods entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(childrenGoods $childrenGood)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('childrengoods_delete', array('id' => $childrenGood->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /*public function cloneAction()
    {
        $object = $this->admin->getSubject();

        if (!$object) {
            throw new NotFoundHttpException(sprintf('unable to find the object with id : %s', $id));
        }

        // Be careful, you may need to overload the __clone method of your object
        // to set its id to null !
        $clonedObject = clone $object;

        $clonedObject->setName($object->getName().' (Clone)');

        $this->admin->create($clonedObject);

        $this->addFlash('sonata_flash_success', 'Cloned successfully');

        return new RedirectResponse($this->admin->generateUrl('list'));

        // if you have a filtered list and want to keep your filters after the redirect
        // return new RedirectResponse($this->admin->generateUrl('list', $this->admin->getFilterParameters()));
    }*/
}

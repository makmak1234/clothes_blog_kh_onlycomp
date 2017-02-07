<?php

namespace AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AdminBundle\Entity\childrenGoodsCategory;
use AdminBundle\Form\childrenGoodsCategoryType;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * childrenGoodsCategory controller.
 *
 * @Route("/childrengoodscategory")
 */
class childrenGoodsCategoryController extends Controller
{
    /**
     * Lists all childrenGoodsCategory entities.
     *
     * @Route("/", name="childrengoodscategory_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $childrenGoodsCategories = $em->getRepository('AdminBundle:childrenGoodsCategory')->findAll();

        return $this->render('childrengoodscategory/index.html.twig', array(
            'childrenGoodsCategories' => $childrenGoodsCategories,
        ));
    }

    /**
     * Creates a new childrenGoodsCategory entity.
     *
     * @Route("/new", name="childrengoodscategory_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $session = new Session();
        //$session->start();

        $childrenGoodsCategory = new childrenGoodsCategory();
        $form = $this->createForm('AdminBundle\Form\childrenGoodsCategoryType', $childrenGoodsCategory);
        $form->handleRequest($request);

        $childrenGood = "nety";
        /*if($session->get('childrenGood') != null){
            $childrenGood = $session->get('childrenGood');
        }*/

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($childrenGoodsCategory);
            $em->flush();
            if($_POST["add_new_cat"] == 'true'){
                //$session->set('childrenGood', $childrenGood);
                return $this->redirectToRoute('childrengoods_new'//, 
                    /*array('id' => $childrenGood->getId(),
                        'add_new_cat' => $add_new_cat,
                        )*/
                );
            }

            return $this->redirectToRoute('childrengoodscategory_show', array('id' => $childrenGoodsCategory->getId()));
        }

        return $this->render('childrengoodscategory/new.html.twig', array(
            'childrenGoodsCategory' => $childrenGoodsCategory,
            'form' => $form->createView(),
            'childrenGood' => $childrenGood,
        ));
    }

    /**
     * Finds and displays a childrenGoodsCategory entity.
     *
     * @Route("/{id}", name="childrengoodscategory_show")
     * @Method("GET")
     */
    public function showAction(childrenGoodsCategory $childrenGoodsCategory)
    {
        $deleteForm = $this->createDeleteForm($childrenGoodsCategory);

        return $this->render('childrengoodscategory/show.html.twig', array(
            'childrenGoodsCategory' => $childrenGoodsCategory,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing childrenGoodsCategory entity.
     *
     * @Route("/{id}/edit", name="childrengoodscategory_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, childrenGoodsCategory $childrenGoodsCategory)
    {
        $deleteForm = $this->createDeleteForm($childrenGoodsCategory);
        $editForm = $this->createForm('AdminBundle\Form\childrenGoodsCategoryType', $childrenGoodsCategory);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($childrenGoodsCategory);
            $em->flush();

            return $this->redirectToRoute('childrengoodscategory_edit', array('id' => $childrenGoodsCategory->getId()));
        }

        return $this->render('childrengoodscategory/edit.html.twig', array(
            'childrenGoodsCategory' => $childrenGoodsCategory,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a childrenGoodsCategory entity.
     *
     * @Route("/{id}", name="childrengoodscategory_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, childrenGoodsCategory $childrenGoodsCategory)
    {
        $form = $this->createDeleteForm($childrenGoodsCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($childrenGoodsCategory);
            $em->flush();
        }

        return $this->redirectToRoute('childrengoodscategory_index');
    }

    /**
     * Creates a form to delete a childrenGoodsCategory entity.
     *
     * @param childrenGoodsCategory $childrenGoodsCategory The childrenGoodsCategory entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(childrenGoodsCategory $childrenGoodsCategory)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('childrengoodscategory_delete', array('id' => $childrenGoodsCategory->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

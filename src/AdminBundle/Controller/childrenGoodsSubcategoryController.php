<?php

namespace AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AdminBundle\Entity\childrenGoodsSubcategory;
use AdminBundle\Form\childrenGoodsSubcategoryType;

/**
 * childrenGoodsSubcategory controller.
 *
 * @Route("/childrengoodssubcategory")
 */
class childrenGoodsSubcategoryController extends Controller
{
    /**
     * Lists all childrenGoodsSubcategory entities.
     *
     * @Route("/", name="childrengoodssubcategory_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $childrenGoodsSubcategories = $em->getRepository('AdminBundle:childrenGoodsSubcategory')->findAll();

        return $this->render('childrengoodssubcategory/index.html.twig', array(
            'childrenGoodsSubcategories' => $childrenGoodsSubcategories,
        ));
    }

    /**
     * Creates a new childrenGoodsSubcategory entity.
     *
     * @Route("/new", name="childrengoodssubcategory_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $childrenGoodsSubcategory = new childrenGoodsSubcategory();
        $form = $this->createForm('AdminBundle\Form\childrenGoodsSubcategoryType', $childrenGoodsSubcategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($childrenGoodsSubcategory);
            $em->flush();

            return $this->redirectToRoute('childrengoodssubcategory_show', array('id' => $childrenGoodsSubcategory->getId()));
        }

        return $this->render('childrengoodssubcategory/new.html.twig', array(
            'childrenGoodsSubcategory' => $childrenGoodsSubcategory,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a childrenGoodsSubcategory entity.
     *
     * @Route("/{id}", name="childrengoodssubcategory_show")
     * @Method("GET")
     */
    public function showAction(childrenGoodsSubcategory $childrenGoodsSubcategory)
    {
        $deleteForm = $this->createDeleteForm($childrenGoodsSubcategory);

        return $this->render('childrengoodssubcategory/show.html.twig', array(
            'childrenGoodsSubcategory' => $childrenGoodsSubcategory,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing childrenGoodsSubcategory entity.
     *
     * @Route("/{id}/edit", name="childrengoodssubcategory_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, childrenGoodsSubcategory $childrenGoodsSubcategory)
    {
        $deleteForm = $this->createDeleteForm($childrenGoodsSubcategory);
        $editForm = $this->createForm('AdminBundle\Form\childrenGoodsSubcategoryType', $childrenGoodsSubcategory);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($childrenGoodsSubcategory);
            $em->flush();

            return $this->redirectToRoute('childrengoodssubcategory_edit', array('id' => $childrenGoodsSubcategory->getId()));
        }

        return $this->render('childrengoodssubcategory/edit.html.twig', array(
            'childrenGoodsSubcategory' => $childrenGoodsSubcategory,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a childrenGoodsSubcategory entity.
     *
     * @Route("/{id}", name="childrengoodssubcategory_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, childrenGoodsSubcategory $childrenGoodsSubcategory)
    {
        $form = $this->createDeleteForm($childrenGoodsSubcategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($childrenGoodsSubcategory);
            $em->flush();
        }

        return $this->redirectToRoute('childrengoodssubcategory_index');
    }

    /**
     * Creates a form to delete a childrenGoodsSubcategory entity.
     *
     * @param childrenGoodsSubcategory $childrenGoodsSubcategory The childrenGoodsSubcategory entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(childrenGoodsSubcategory $childrenGoodsSubcategory)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('childrengoodssubcategory_delete', array('id' => $childrenGoodsSubcategory->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

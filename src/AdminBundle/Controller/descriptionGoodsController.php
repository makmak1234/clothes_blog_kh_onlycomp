<?php

namespace AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AdminBundle\Entity\descriptionGoods;
use AdminBundle\Form\descriptionGoodsType;

/**
 * descriptionGoods controller.
 *
 * @Route("/descriptiongoods")
 */
class descriptionGoodsController extends Controller
{
    /**
     * Lists all descriptionGoods entities.
     *
     * @Route("/", name="descriptiongoods_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $descriptionGoods = $em->getRepository('AdminBundle:descriptionGoods')->findAll();

        return $this->render('descriptiongoods/index.html.twig', array(
            'descriptionGoods' => $descriptionGoods,
        ));
    }

    /**
     * Creates a new descriptionGoods entity.
     *
     * @Route("/new", name="descriptiongoods_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $descriptionGood = new descriptionGoods();
        $form = $this->createForm('AdminBundle\Form\descriptionGoodsType', $descriptionGood);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($descriptionGood);
            $em->flush();

            return $this->redirectToRoute('descriptiongoods_show', array('id' => $descriptionGood->getId()));
        }

        return $this->render('descriptiongoods/new.html.twig', array(
            'descriptionGood' => $descriptionGood,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a descriptionGoods entity.
     *
     * @Route("/{id}", name="descriptiongoods_show")
     * @Method("GET")
     */
    public function showAction(descriptionGoods $descriptionGood)
    {
        $deleteForm = $this->createDeleteForm($descriptionGood);

        return $this->render('descriptiongoods/show.html.twig', array(
            'descriptionGood' => $descriptionGood,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing descriptionGoods entity.
     *
     * @Route("/{id}/edit", name="descriptiongoods_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, descriptionGoods $descriptionGood)
    {
        $deleteForm = $this->createDeleteForm($descriptionGood);
        $editForm = $this->createForm('AdminBundle\Form\descriptionGoodsType', $descriptionGood);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($descriptionGood);
            $em->flush();

            return $this->redirectToRoute('descriptiongoods_edit', array('id' => $descriptionGood->getId()));
        }

        return $this->render('descriptiongoods/edit.html.twig', array(
            'descriptionGood' => $descriptionGood,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a descriptionGoods entity.
     *
     * @Route("/{id}", name="descriptiongoods_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, descriptionGoods $descriptionGood)
    {
        $form = $this->createDeleteForm($descriptionGood);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($descriptionGood);
            $em->flush();
        }

        return $this->redirectToRoute('descriptiongoods_index');
    }

    /**
     * Creates a form to delete a descriptionGoods entity.
     *
     * @param descriptionGoods $descriptionGood The descriptionGoods entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(descriptionGoods $descriptionGood)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('descriptiongoods_delete', array('id' => $descriptionGood->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

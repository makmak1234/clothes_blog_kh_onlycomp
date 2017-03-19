<?php

namespace AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AdminBundle\Entity\priceGoods;
use AdminBundle\Form\priceGoodsType;

/**
 * priceGoods controller.
 *
 * @Route("/pricegoods")
 */
class priceGoodsController extends Controller
{
    /**
     * Lists all priceGoods entities.
     *
     * @Route("/", name="pricegoods_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $priceGoods = $em->getRepository('AdminBundle:priceGoods')->findAll();

        return $this->render('pricegoods/index.html.twig', array(
            'priceGoods' => $priceGoods,
        ));
    }

    /**
     * Creates a new priceGoods entity.
     *
     * @Route("/new", name="pricegoods_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $priceGood = new priceGoods();
        $form = $this->createForm('AdminBundle\Form\priceGoodsType', $priceGood);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($priceGood);
            $em->flush();

            return $this->redirectToRoute('pricegoods_show', array('id' => $priceGood->getId()));
        }

        return $this->render('pricegoods/new.html.twig', array(
            'priceGood' => $priceGood,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a priceGoods entity.
     *
     * @Route("/{id}", name="pricegoods_show")
     * @Method("GET")
     */
    public function showAction(priceGoods $priceGood)
    {
        $deleteForm = $this->createDeleteForm($priceGood);

        return $this->render('pricegoods/show.html.twig', array(
            'priceGood' => $priceGood,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing priceGoods entity.
     *
     * @Route("/{id}/edit", name="pricegoods_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, priceGoods $priceGood)
    {
        $deleteForm = $this->createDeleteForm($priceGood);
        $editForm = $this->createForm('AdminBundle\Form\priceGoodsType', $priceGood);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($priceGood);
            $em->flush();

            return $this->redirectToRoute('pricegoods_edit', array('id' => $priceGood->getId()));
        }

        return $this->render('pricegoods/edit.html.twig', array(
            'priceGood' => $priceGood,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a priceGoods entity.
     *
     * @Route("/{id}", name="pricegoods_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, priceGoods $priceGood)
    {
        $form = $this->createDeleteForm($priceGood);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($priceGood);
            $em->flush();
        }

        return $this->redirectToRoute('pricegoods_index');
    }

    /**
     * Creates a form to delete a priceGoods entity.
     *
     * @param priceGoods $priceGood The priceGoods entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(priceGoods $priceGood)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pricegoods_delete', array('id' => $priceGood->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

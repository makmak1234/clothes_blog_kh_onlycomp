<?php

namespace AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AdminBundle\Entity\size;
use AdminBundle\Form\sizeType;

/**
 * size controller.
 *
 * @Route("/size")
 */
class sizeController extends Controller
{
    /**
     * Lists all size entities.
     *
     * @Route("/", name="size_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $sizes = $em->getRepository('AdminBundle:size')->findAll();

        return $this->render('size/index.html.twig', array(
            'sizes' => $sizes,
        ));
    }

    /**
     * Creates a new size entity.
     *
     * @Route("/new", name="size_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $size = new size();
        $form = $this->createForm('AdminBundle\Form\sizeType', $size);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($size);
            $em->flush();

            return $this->redirectToRoute('size_show', array('id' => $size->getId()));
        }

        return $this->render('size/new.html.twig', array(
            'size' => $size,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a size entity.
     *
     * @Route("/{id}", name="size_show")
     * @Method("GET")
     */
    public function showAction(size $size)
    {
        $deleteForm = $this->createDeleteForm($size);

        return $this->render('size/show.html.twig', array(
            'size' => $size,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing size entity.
     *
     * @Route("/{id}/edit", name="size_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, size $size)
    {
        $deleteForm = $this->createDeleteForm($size);
        $editForm = $this->createForm('AdminBundle\Form\sizeType', $size);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($size);
            $em->flush();

            return $this->redirectToRoute('size_edit', array('id' => $size->getId()));
        }

        return $this->render('size/edit.html.twig', array(
            'size' => $size,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a size entity.
     *
     * @Route("/{id}", name="size_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, size $size)
    {
        $form = $this->createDeleteForm($size);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($size);
            $em->flush();
        }

        return $this->redirectToRoute('size_index');
    }

    /**
     * Creates a form to delete a size entity.
     *
     * @param size $size The size entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(size $size)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('size_delete', array('id' => $size->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

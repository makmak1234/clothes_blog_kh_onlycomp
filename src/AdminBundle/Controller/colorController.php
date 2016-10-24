<?php

namespace AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AdminBundle\Entity\color;
use AdminBundle\Form\colorType;

/**
 * color controller.
 *
 * @Route("/color")
 */
class colorController extends Controller
{
    /**
     * Lists all color entities.
     *
     * @Route("/", name="color_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $colors = $em->getRepository('AdminBundle:color')->findAll();

        return $this->render('color/index.html.twig', array(
            'colors' => $colors,
        ));
    }

    /**
     * Creates a new color entity.
     *
     * @Route("/new", name="color_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $color = new color();
        $form = $this->createForm('AdminBundle\Form\colorType', $color);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($color);
            $em->flush();

            return $this->redirectToRoute('color_show', array('id' => $color->getId()));
        }

        return $this->render('color/new.html.twig', array(
            'color' => $color,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a color entity.
     *
     * @Route("/{id}", name="color_show")
     * @Method("GET")
     */
    public function showAction(color $color)
    {
        $deleteForm = $this->createDeleteForm($color);

        return $this->render('color/show.html.twig', array(
            'color' => $color,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing color entity.
     *
     * @Route("/{id}/edit", name="color_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, color $color)
    {
        $deleteForm = $this->createDeleteForm($color);
        $editForm = $this->createForm('AdminBundle\Form\colorType', $color);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($color);
            $em->flush();

            return $this->redirectToRoute('color_edit', array('id' => $color->getId()));
        }

        return $this->render('color/edit.html.twig', array(
            'color' => $color,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a color entity.
     *
     * @Route("/{id}", name="color_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, color $color)
    {
        $form = $this->createDeleteForm($color);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($color);
            $em->flush();
        }

        return $this->redirectToRoute('color_index');
    }

    /**
     * Creates a form to delete a color entity.
     *
     * @param color $color The color entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(color $color)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('color_delete', array('id' => $color->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

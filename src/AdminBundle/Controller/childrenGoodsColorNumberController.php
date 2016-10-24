<?php

namespace AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AdminBundle\Entity\childrenGoodsColorNumber;
use AdminBundle\Form\childrenGoodsColorNumberType;

/**
 * childrenGoodsColorNumber controller.
 *
 * @Route("/childrengoodscolornumber")
 */
class childrenGoodsColorNumberController extends Controller
{
    /**
     * Lists all childrenGoodsColorNumber entities.
     *
     * @Route("/", name="childrengoodscolornumber_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $childrenGoodsColorNumbers = $em->getRepository('AdminBundle:childrenGoodsColorNumber')->findAll();

        return $this->render('childrengoodscolornumber/index.html.twig', array(
            'childrenGoodsColorNumbers' => $childrenGoodsColorNumbers,
        ));
    }

    /**
     * Creates a new childrenGoodsColorNumber entity.
     *
     * @Route("/new", name="childrengoodscolornumber_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $childrenGoodsColorNumber = new childrenGoodsColorNumber();
        $form = $this->createForm('AdminBundle\Form\childrenGoodsColorNumberType', $childrenGoodsColorNumber);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($childrenGoodsColorNumber);
            $em->flush();

            return $this->redirectToRoute('childrengoodscolornumber_show', array('id' => $childrenGoodsColorNumber->getId()));
        }

        return $this->render('childrengoodscolornumber/new.html.twig', array(
            'childrenGoodsColorNumber' => $childrenGoodsColorNumber,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a childrenGoodsColorNumber entity.
     *
     * @Route("/{id}", name="childrengoodscolornumber_show")
     * @Method("GET")
     */
    public function showAction(childrenGoodsColorNumber $childrenGoodsColorNumber)
    {
        $deleteForm = $this->createDeleteForm($childrenGoodsColorNumber);

        return $this->render('childrengoodscolornumber/show.html.twig', array(
            'childrenGoodsColorNumber' => $childrenGoodsColorNumber,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing childrenGoodsColorNumber entity.
     *
     * @Route("/{id}/edit", name="childrengoodscolornumber_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, childrenGoodsColorNumber $childrenGoodsColorNumber)
    {
        $deleteForm = $this->createDeleteForm($childrenGoodsColorNumber);
        $editForm = $this->createForm('AdminBundle\Form\childrenGoodsColorNumberType', $childrenGoodsColorNumber);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($childrenGoodsColorNumber);
            $em->flush();

            return $this->redirectToRoute('childrengoodscolornumber_edit', array('id' => $childrenGoodsColorNumber->getId()));
        }

        return $this->render('childrengoodscolornumber/edit.html.twig', array(
            'childrenGoodsColorNumber' => $childrenGoodsColorNumber,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a childrenGoodsColorNumber entity.
     *
     * @Route("/{id}", name="childrengoodscolornumber_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, childrenGoodsColorNumber $childrenGoodsColorNumber)
    {
        $form = $this->createDeleteForm($childrenGoodsColorNumber);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($childrenGoodsColorNumber);
            $em->flush();
        }

        return $this->redirectToRoute('childrengoodscolornumber_index');
    }

    /**
     * Creates a form to delete a childrenGoodsColorNumber entity.
     *
     * @param childrenGoodsColorNumber $childrenGoodsColorNumber The childrenGoodsColorNumber entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(childrenGoodsColorNumber $childrenGoodsColorNumber)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('childrengoodscolornumber_delete', array('id' => $childrenGoodsColorNumber->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

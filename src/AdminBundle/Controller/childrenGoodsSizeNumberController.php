<?php

namespace AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AdminBundle\Entity\childrenGoodsSizeNumber;
use AdminBundle\Form\childrenGoodsSizeNumberType;

/**
 * childrenGoodsSizeNumber controller.
 *
 * @Route("/childrengoodssizenumber")
 */
class childrenGoodsSizeNumberController extends Controller
{
    /**
     * Lists all childrenGoodsSizeNumber entities.
     *
     * @Route("/", name="childrengoodssizenumber_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $childrenGoodsSizeNumbers = $em->getRepository('AdminBundle:childrenGoodsSizeNumber')->findAll();

        return $this->render('childrengoodssizenumber/index.html.twig', array(
            'childrenGoodsSizeNumbers' => $childrenGoodsSizeNumbers,
        ));
    }

    /**
     * Creates a new childrenGoodsSizeNumber entity.
     *
     * @Route("/new", name="childrengoodssizenumber_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $childrenGoodsSizeNumber = new childrenGoodsSizeNumber();
        $form = $this->createForm('AdminBundle\Form\childrenGoodsSizeNumberType', $childrenGoodsSizeNumber);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {

            //return $this->render('childrengoods/myshow.html.twig', array(
            //    'childrenGood' => $childrenGoodsSizeNumber,
            //));

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($childrenGoodsSizeNumber);
                $em->flush();
            }

            return $this->redirectToRoute('childrengoodssizenumber_show', array('id' => $childrenGoodsSizeNumber->getId()));
        }

        return $this->render('childrengoodssizenumber/new.html.twig', array(
            'childrenGoodsSizeNumber' => $childrenGoodsSizeNumber,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a childrenGoodsSizeNumber entity.
     *
     * @Route("/{id}", name="childrengoodssizenumber_show")
     * @Method("GET")
     */
    public function showAction(childrenGoodsSizeNumber $childrenGoodsSizeNumber)
    {
        $deleteForm = $this->createDeleteForm($childrenGoodsSizeNumber);

        return $this->render('childrengoodssizenumber/show.html.twig', array(
            'childrenGoodsSizeNumber' => $childrenGoodsSizeNumber,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing childrenGoodsSizeNumber entity.
     *
     * @Route("/{id}/edit", name="childrengoodssizenumber_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, childrenGoodsSizeNumber $childrenGoodsSizeNumber)
    {
        $deleteForm = $this->createDeleteForm($childrenGoodsSizeNumber);
        $editForm = $this->createForm('AdminBundle\Form\childrenGoodsSizeNumberType', $childrenGoodsSizeNumber);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($childrenGoodsSizeNumber);
            $em->flush();

            return $this->redirectToRoute('childrengoodssizenumber_edit', array('id' => $childrenGoodsSizeNumber->getId()));
        }

        return $this->render('childrengoodssizenumber/edit.html.twig', array(
            'childrenGoodsSizeNumber' => $childrenGoodsSizeNumber,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a childrenGoodsSizeNumber entity.
     *
     * @Route("/{id}", name="childrengoodssizenumber_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, childrenGoodsSizeNumber $childrenGoodsSizeNumber)
    {
        $form = $this->createDeleteForm($childrenGoodsSizeNumber);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($childrenGoodsSizeNumber);
            $em->flush();
        }

        return $this->redirectToRoute('childrengoodssizenumber_index');
    }

    /**
     * Creates a form to delete a childrenGoodsSizeNumber entity.
     *
     * @param childrenGoodsSizeNumber $childrenGoodsSizeNumber The childrenGoodsSizeNumber entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(childrenGoodsSizeNumber $childrenGoodsSizeNumber)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('childrengoodssizenumber_delete', array('id' => $childrenGoodsSizeNumber->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

<?php

namespace AerolineaBundle\Controller;

use AerolineaBundle\Entity\Aviones;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Avione controller.
 *
 */
class AvionesController extends Controller
{
    /**
     * Lists all avione entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $aviones = $em->getRepository('AerolineaBundle:Aviones')->findAll();

        return $this->render('aviones/index.html.twig', array(
            'aviones' => $aviones,
        ));
    }

    /**
     * Creates a new avione entity.
     *
     */
    public function newAction(Request $request)
    {
        $avione = new Aviones();
        $form = $this->createForm('AerolineaBundle\Form\AvionesType', $avione);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($avione);
            $em->flush();

            return $this->redirectToRoute('aviones_show', array('idAvion' => $avione->getIdavion()));
        }

        return $this->render('aviones/new.html.twig', array(
            'avione' => $avione,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a avione entity.
     *
     */
    public function showAction(Aviones $avione)
    {
        $deleteForm = $this->createDeleteForm($avione);

        return $this->render('aviones/show.html.twig', array(
            'avione' => $avione,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing avione entity.
     *
     */
    public function editAction(Request $request, Aviones $avione)
    {
        $deleteForm = $this->createDeleteForm($avione);
        $editForm = $this->createForm('AerolineaBundle\Form\AvionesType', $avione);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('aviones_edit', array('idAvion' => $avione->getIdavion()));
        }

        return $this->render('aviones/edit.html.twig', array(
            'avione' => $avione,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a avione entity.
     *
     */
    public function deleteAction(Request $request, Aviones $avione)
    {
        $form = $this->createDeleteForm($avione);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($avione);
            $em->flush();
        }

        return $this->redirectToRoute('aviones_index');
    }

    /**
     * Creates a form to delete a avione entity.
     *
     * @param Aviones $avione The avione entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Aviones $avione)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('aviones_delete', array('idAvion' => $avione->getIdavion())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

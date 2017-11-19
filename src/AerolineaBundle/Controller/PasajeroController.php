<?php

namespace AerolineaBundle\Controller;

use AerolineaBundle\Entity\Pasajero;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Pasajero controller.
 *
 */
class PasajeroController extends Controller
{
    /**
     * Lists all pasajero entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $pasajeros = $em->getRepository('AerolineaBundle:Pasajero')->findAll();

        return $this->render('pasajero/index.html.twig', array(
            'pasajeros' => $pasajeros,
        ));
    }

    /**
     * Creates a new pasajero entity.
     *
     */
    public function newAction(Request $request)
    {
        $pasajero = new Pasajero();
        $form = $this->createForm('AerolineaBundle\Form\PasajeroType', $pasajero);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($pasajero);
            $em->flush();

            return $this->redirectToRoute('pasajero_show', array('id' => $pasajero->getId()));
        }

        return $this->render('pasajero/new.html.twig', array(
            'pasajero' => $pasajero,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a pasajero entity.
     *
     */
    public function showAction(Pasajero $pasajero)
    {
        $deleteForm = $this->createDeleteForm($pasajero);

        return $this->render('pasajero/show.html.twig', array(
            'pasajero' => $pasajero,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing pasajero entity.
     *
     */
    public function editAction(Request $request, Pasajero $pasajero)
    {
        $deleteForm = $this->createDeleteForm($pasajero);
        $editForm = $this->createForm('AerolineaBundle\Form\PasajeroType', $pasajero);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('pasajero_show', array('id' => $pasajero->getId()));
        }

        return $this->render('pasajero/edit.html.twig', array(
            'pasajero' => $pasajero,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a pasajero entity.
     *
     */
    public function deleteAction(Request $request, Pasajero $pasajero)
    {
        $form = $this->createDeleteForm($pasajero);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($pasajero);
            $em->flush();
        }

        return $this->redirectToRoute('pasajero_index');
    }

    /**
     * Creates a form to delete a pasajero entity.
     *
     * @param Pasajero $pasajero The pasajero entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Pasajero $pasajero)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pasajero_delete', array('id' => $pasajero->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

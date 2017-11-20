<?php

namespace AerolineaBundle\Controller;

use AerolineaBundle\Entity\Boletos;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Boleto controller.
 *
 */
class BoletosController extends Controller
{
    /**
     * Lists all boleto entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $boletos = $em->getRepository('AerolineaBundle:Boletos')->findAll();

        return $this->render('boletos/index.html.twig', array(
            'boletos' => $boletos,
        ));
    }

    /**
     * Creates a new boleto entity.
     *
     */
    public function newAction(Request $request)
    {
        $boleto = new Boletos();
        $form = $this->createForm('AerolineaBundle\Form\BoletosType', $boleto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $boleto->setIdPasajero($form->get('idPasajero')->getData()->getid());
            $em = $this->getDoctrine()->getManager();
            $em->persist($boleto);
            $em->flush();

            return $this->redirectToRoute('boletos_show', array('idBoleto' => $boleto->getIdboleto()));
        }

        return $this->render('boletos/new.html.twig', array(
            'boleto' => $boleto,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a boleto entity.
     *
     */
    public function showAction(Boletos $boleto)
    {
        $deleteForm = $this->createDeleteForm($boleto);

        return $this->render('boletos/show.html.twig', array(
            'boleto' => $boleto,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing boleto entity.
     *
     */
    public function editAction(Request $request, Boletos $boleto)
    {
        $deleteForm = $this->createDeleteForm($boleto);
        $editForm = $this->createForm('AerolineaBundle\Form\BoletosType', $boleto);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('boletos_edit', array('idBoleto' => $boleto->getIdboleto()));
        }

        return $this->render('boletos/edit.html.twig', array(
            'boleto' => $boleto,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a boleto entity.
     *
     */
    public function deleteAction(Request $request, Boletos $boleto)
    {
        $form = $this->createDeleteForm($boleto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($boleto);
            $em->flush();
        }

        return $this->redirectToRoute('boletos_index');
    }

    /**
     * Creates a form to delete a boleto entity.
     *
     * @param Boletos $boleto The boleto entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Boletos $boleto)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('boletos_delete', array('idBoleto' => $boleto->getIdboleto())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

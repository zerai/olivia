<?php

namespace Zlab\FrontendBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Zlab\FrontendBundle\Entity\Ebook;
use Zlab\FrontendBundle\Form\EbookType;

/**
 * Ebook controller.
 *
 */
class EbookController extends Controller
{
    /**
     * Lists all Ebook entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ZlabFrontendBundle:Ebook')->findAll();

        return $this->render('ZlabFrontendBundle:Ebook:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Ebook entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ZlabFrontendBundle:Ebook')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ebook entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ZlabFrontendBundle:Ebook:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Ebook entity.
     *
     */
    public function newAction()
    {
        $entity = new Ebook();
        $form   = $this->createForm(new EbookType(), $entity);

        return $this->render('ZlabFrontendBundle:Ebook:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Ebook entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Ebook();
        $form = $this->createForm(new EbookType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('R_Ebook_show', array('id' => $entity->getId())));
        }

        return $this->render('ZlabFrontendBundle:Ebook:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Ebook entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ZlabFrontendBundle:Ebook')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ebook entity.');
        }

        $editForm = $this->createForm(new EbookType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ZlabFrontendBundle:Ebook:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Ebook entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ZlabFrontendBundle:Ebook')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ebook entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new EbookType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('R_Ebook_edit', array('id' => $id)));
        }

        return $this->render('ZlabFrontendBundle:Ebook:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Ebook entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ZlabFrontendBundle:Ebook')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Ebook entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('R_Ebook'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}

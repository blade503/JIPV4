<?php

namespace AdminBundle\Controller;

use JIPBundle\Entity\Annonce;
use AdminBundle\Form\Type\AnnonceType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AnnonceController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $annonces = $this->get('jip.manager.annonce')->getAllAnnonces();

        return $this->render('AdminBundle:annonce:index.html.twig', array(
            'annonces' => $annonces)
        );
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newAction(Request $request)
    {
        $annonce = new Annonce();
        $form = $this->createForm(AnnonceType::class, $annonce);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $this->container->get('jip.manager.annonce')->setCreationDateValue($annonce);
            $this->container->get('jip.manager.annonce')->saveAnnonce($annonce);

            return $this->redirectToRoute('admin_annonce_index');
        }

        return $this->render('AdminBundle:annonce:new.html.twig', array(
                'form' => $form->createView())
        );
    }


    /**
     * @param Request $request
     * @param int     $id
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request, $id)
    {
        $annonce = $this->get('jip.manager.annonce')->findAnnonceById($id);

        $form = $this->createForm(AnnonceType::class, $annonce);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $annonce->setUpdatedAt(new \DateTime('now'));
            $this->container->get('jip.manager.annonce')->saveAnnonce($annonce);

            return $this->redirectToRoute('admin_annonce_index');
        }

        return $this->render('AdminBundle:annonce:edit.html.twig', array(
                'form' => $form->createView())
        );
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function removeAction($id)
    {
        $annonce = $this->get('jip.manager.annonce')->findAnnonceById($id);
        $this->get('jip.manager.annonce')->deleteAnnonce($annonce);

        return $this->redirectToRoute('admin_annonce_index');
    }
}

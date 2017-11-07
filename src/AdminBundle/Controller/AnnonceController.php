<?php

namespace AdminBundle\Controller;

use JIPBundle\Entity\Annonce;
use AdminBundle\Form\AnnonceType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newAction()
    {
        $annonce = new Annonce();
        $form = $this->createForm(AnnonceType::class, $annonce);

        if($form->isSubmitted() && $form->isValid()){
            //DO something
        }

        return $this->render('AdminBundle:annonce:new.html.twig', array(
                'form' => $form->createView())
        );
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editAction($id)
    {
        $annonce = $this->get('jip.manager.annonce')->findAnnonceById($id);

        $form = $this->createForm(AnnonceType::class, $annonce);

        if ($form->isSubmitted() && $form->isValid()) {
            //DO Something
        }

        return $this->render('AdminBundle:annonce:new.html.twig', array(
                'form' => $form->createView())
        );
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function removeAction($id)
    {
        $annonce = $this->get('jip.manager.annonce')->findAnnonceById($id);
        $this->get('jip.manager.annonce')->deletennonce($annonce);

        return $this->redirectToRoute('admin_annonce_index');
    }
}

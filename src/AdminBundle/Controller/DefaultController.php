<?php

namespace AdminBundle\Controller;

use JIPBundle\Entity\Annonce;
use AdminBundle\Form\AnnonceType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
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

}

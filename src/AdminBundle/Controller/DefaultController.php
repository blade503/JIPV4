<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $annonces = $this->get('jip.manager.annonce')->getAllAnnonces();

        return $this->render('AdminBundle:annonce:index.html.twig', array(
            'annonces' => $annonces)
        );
    }
}

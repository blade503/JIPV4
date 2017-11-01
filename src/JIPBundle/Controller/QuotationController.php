<?php

namespace JIPBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class QuotationController extends Controller
{
    public function indexAction()
    {
        return $this->render('JIPBundle:Default:index.html.twig');
    }
}

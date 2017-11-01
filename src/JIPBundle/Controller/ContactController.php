<?php

namespace JIPBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ContactController extends Controller
{
    use EntityControllerTrait;

    public function indexAction()
    {
        return $this->render('JIPBundle:Default:index.html.twig');
    }
}

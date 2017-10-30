<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        try {
            $this->getDoctrine()->getEntityManager()->getConnection()->connect();
            var_dump('connecte');
        } catch (\Exception $e) {
            // failed to connect
            var_dump('failed to connect');
        }

        die;
    }
}

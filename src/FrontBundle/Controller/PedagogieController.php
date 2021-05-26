<?php

namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class PedagogieController extends Controller
{
    /**
     * @Route("/mariamontessori", name="mariamontessori")
     */
    public function indexAction()
    {
        return $this->render('FrontBundle:Pedagogie:maria.html.twig');
    }
}

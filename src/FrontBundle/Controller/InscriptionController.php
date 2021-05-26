<?php

namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class InscriptionController extends Controller
{
    /**
     * @Route("/", name="")
     */
    public function modaliteAction()
    {
        return $this->render('FrontBundle:Inscription:modalite.html.twig');
    }

    public function fraisAction()
    {
        return $this->render('FrontBundle:Inscription:frais.html.twig');
    }
}

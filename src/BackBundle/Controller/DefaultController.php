<?php

namespace BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction(Request $request)
    {
        $user = $this->getUser();
        //verification de l'existance du user
        if ($user === null) {
            return $this->redirect($this->generateUrl('fos_user_security_logout'));
        }
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $em = $this->getDoctrine()->getManager();
        $eleve = $em->getRepository('UserBundle:Eleve')->eleve();
        $prof = $em->getRepository('UserBundle:Professeur')->prof();
        return $this->render('BackBundle:Default:index.html.twig',array(
            'prof'  => $prof,
            'eleve' => $eleve));
    }
}

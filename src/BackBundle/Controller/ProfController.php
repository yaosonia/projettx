<?php

namespace BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use \FOS\UserBundle\Model\UserInterface;
use UserBundle\Entity\Professeur;
use BackBundle\Form\ProfesseurType;

class ProfController extends Controller
{
    /**
     * @Route("/")
     */
    public function saveAction( Request $request)
    {
    	 $user = $this->getUser();
        //verification de l'existance du user
        if ($user === null) {
            return $this->redirect($this->generateUrl('fos_user_security_logout'));
        }
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $em = $this->getDoctrine()->getManager();
        $professeur = new Professeur();
        $form = $this->createForm('BackBundle\Form\ProfesseurType', $professeur);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($professeur);
            $em->flush();
            return $this->redirectToRoute('save_prof');
        }

            return $this->render('BackBundle:Prof:save.html.twig', array(
                    'form' => $form->createView(),
        ));   
    }

    public function listeprofAction(Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $em = $this->getDoctrine()->getManager();
        $prof = $em->getRepository('UserBundle:Professeur')->findAll();
        return $this->render('BackBundle:Prof:listeprof.html.twig',array(
            'prof'  =>$prof,
        ));
    }

    public function listeparentAction(Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $em = $this->getDoctrine()->getManager();
        $parents = $em->getRepository('UserBundle:Parents')->findAll();
        return $this->render('BackBundle:Prof:listeparent.html.twig',array(
            'parents'  =>$parents,
        ));
    }
}
<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use UserBundle\Entity\Eleve;
use UserBundle\Form\EleveType;

class EleveController extends Controller
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
        $em = $this->getDoctrine()->getManager();
        $eleve = new Eleve();
        $parents = $em->getRepository('UserBundle:Utilisateur')->findAll();
        $form = $this->createForm('UserBundle\Form\EleveType', $eleve);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($eleve);
            $em->flush();
            $this->get('session')->getFlashBag()->add('eleve.success', 'L\'élève a bien été ajouté');
            return $this->redirectToRoute('save_eleve');
        }

            return $this->render('BackBundle:Eleve:save.html.twig', array(
                    'form' => $form->createView(),
                    'parents' =>$parents,
        ));   
    }

    public function listeAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $eleves = $em->getRepository('UserBundle:Eleve')->findAll();
        return $this->render('BackBundle:Eleve:liste.html.twig',array(
            'eleves'  =>$eleves,
        ));
    }
}
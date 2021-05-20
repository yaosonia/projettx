<?php

namespace BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use BackBundle\Entity\Formation;
use BackBundle\Form\FormationType;
use BackBundle\Entity\Inscrire;
use BackBundle\Form\InscrireType;
class FormationController extends Controller

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
        $formations = $em->getRepository('BackBundle:Formation')->findAll();
        $formation = new Formation();
        $form = $this->createForm('BackBundle\Form\FormationType', $formation);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($formation);
            $em->flush();
            $this->get('session')->getFlashBag()->add('formation.success', 'La formation a bien été ajoutée');
            return $this->redirectToRoute('formation');
        }
        return $this->render('BackBundle:Formation:index.html.twig', array(
            'form' => $form->createView(),
            'formations'  =>$formations,
        ));
    }

    public function inscrireAction( Request $request)
    {
        $user = $this->getUser();
        //verification de l'existance du user
        if ($user === null) {
            return $this->redirect($this->generateUrl('fos_user_security_logout'));
        }
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $em = $this->getDoctrine()->getManager();
        $inscrire = new Inscrire();
        $formations = $em->getRepository('BackBundle:Formation')->findAll();
        $eleves = $em->getRepository('UserBundle:Eleve')->findAll();
        $inscriptions = $em->getRepository('BackBundle:Inscrire')->findAll();
        $form = $this->createForm('BackBundle\Form\InscrireType', $inscrire);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($inscrire);
            $em->flush();
            $this->get('session')->getFlashBag()->add('inscrire.success', 'L\'élève a bien été inscrit');
            return $this->redirectToRoute('inscrireleve');
        }
        return $this->render('BackBundle:Formation:inscrireleve.html.twig', array(
            'form' => $form->createView(),
            'formations' =>$formations,
            'eleves' =>$eleves,
            'inscriptions' => $inscriptions
        ));
    }

    //modification
    public function updateAction(Request $request, $id){
        $user = $this->getUser();
        if ($user === null) {
            return $this->redirect($this->generateUrl('fos_user_security_logout'));
        }
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $em = $this->getDoctrine()->getManager();
        $inscription = $em->getRepository('BackBundle:Inscrire')->find($id);
        $form = $this->createForm('BackBundle\Form\InscrireType', $inscription);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($inscription);
            $em->flush();
            $this->get('session')->getFlashBag()->add('inscriptionmodif.success', 'Modification réussie');
            return $this->redirectToRoute('inscrireleve');
        }
        return $this->render('BackBundle:Formation:modifierinscription.html.twig', array(
            'inscription' => $inscription,
            'form' => $form->createView(),
        ));

    }

    //suppression
    public function deleteAction(Request $request, $id){
        $user = $this->getUser();
        if ($user === null) {
            return $this->redirect($this->generateUrl('fos_user_security_logout'));
        }
        $em = $this->getDoctrine()->getManager();
        $inscription = $em->getRepository('BackBundle:Inscrire')->find($id);
            $em->remove($inscription);
            $em->flush();
            return $this->redirect($this->generateUrl('inscrireleve'));

    }
}

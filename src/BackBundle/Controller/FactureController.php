<?php

namespace BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use UserBundle\Entity\Eleve;
use Symfony\Component\HttpFoundation\Request;



use BackBundle\Entity\Paiement;

class FactureController extends Controller
{
    public function saveAction(Request $request, $id)
    {
    	$user = $this->getUser();
        //verification de l'existance du user
        if ($user === null) {
            return $this->redirect($this->generateUrl('fos_user_security_logout'));
        }
        $em = $this->getDoctrine()->getManager();
        $paiement = new Paiement();
        $formations = $em->getRepository('BackBundle:Formation')->findAll();
        $form = $this->createForm('BackBundle\Form\PaiementType', $paiement);
        $eleve = $em->getRepository('UserBundle:Eleve')->find($id);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $prix = (int) $paiement->getFormation()->getPrix();
            $reduction = (int) $paiement->getReduction();
            $paiement->setMontantPaiement($prix);
            $paiement->setMontantFinal($prix - $reduction);
            
            $paiement->setEleve($eleve);
            $paiement->setParents($eleve->getParents());
            $em->persist($paiement);
            $em->flush();
            $this->get('session')->getFlashBag()->add('facture.success', 'Le paiement a bien été ajouté');
            return $this->redirectToRoute('liste_facture');
        }

            return $this->render('BackBundle:Paiement:save.html.twig', array(
                    'form' => $form->createView(),
                    'formations' =>$formations,
                    'eleve' => $eleve
        ));   
    }


    public function genererfactureAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $paiement = $em->getRepository('BackBundle:Paiement')->findByEleve($id);
        $eleve = $em->getRepository('UserBundle:Eleve')->find($id);
        
        return $this->render('BackBundle:Default:facture.html.twig', 
        [
            'paiement' => $paiement[0],
            'eleve' => $eleve
        ]);
    }
    public function listeAction(Request $request, $id=null)
    {
        $em = $this->getDoctrine()->getManager();
        if($id){
            $factures = $em->getRepository('BackBundle:Paiement')->findByEleve($id);
        }else{
            $factures = $em->getRepository('BackBundle:Paiement')->findAll();
        }
        return $this->render('BackBundle:Paiement:liste.html.twig',array(
            'factures'  =>$factures,
        ));
    }
    public function getAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $paiement = $em->getRepository('BackBundle:Paiement')->find($id);
        return $this->render('BackBundle:Paiement:get.html.twig',array(
            'paiement'  =>$paiement,
        ));
    }

    public function listeParentAction(Request $request)
    {
        # L'utilisateur doit toujours s'authentifier
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $email = $user->getEmail();
        $parent = $em->getRepository('UserBundle:Parents')->findOneByEmail($email);
        $factures = $em->getRepository('BackBundle:Paiement')->findByParents($parent->getId());
        return $this->render('BackBundle:Paiement:liste.html.twig',array(
            'factures'  =>$factures,
        ));
    }
}

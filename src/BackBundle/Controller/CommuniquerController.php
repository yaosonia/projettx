<?php

// /src/BackBundle/Controller/CommuniquerController.php
namespace BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;

use BackBundle\Entity\Communiquer;
use UserBundle\Entity\Parents;
use UserBundle\Entity\Professeur;
use BackBundle\Form\CommuniquerType;

class CommuniquerController extends Controller
{
   /**
     * @Route("/")
     */

    public function nouveaumessageAction(Request $request)
    {
        # L'utilisateur doit toujours s'authentifier
        $user = $this->getUser();

          //verification de l'existance du user
          if ($user === null) {
              return $this->redirect($this->generateUrl('fos_user_security_logout'));
          }
          
        # Création d'un objet qui fait réference à la classe Communiquer  
        $communiquer = new Communiquer();
        $parent = new Parents();
        
       #$communiquer->setProfesseur( $user);
       $form = $this->createForm('BackBundle\Form\CommuniquerType', $communiquer);     

        # Handle form response
       $form->handleRequest($request);

        # check if form is submitted, recuperer les données dans des variables
       if($form->isSubmitted() &&  $form->isValid()){

        // getData();
         $parent = $form['parents']->getData(); 
      //  # set form data   
      //   $communiquer->setParents( $parent);
             
   # finally add data in database
        $sn = $this->getDoctrine()->getManager();      
        $sn -> persist($communiquer);
        $sn -> flush();

        #Send copie of the message in own address mail
        $message =  \Swift_Message::newInstance()
        ->setSubject('Notification de la messagerie NID DES ANGES | Ne pas repondre')
        ->setFrom('nis.desanges2021@gmail.com')
        ->setTo($parent -> getEmail())
        ->setBody(
          '<p>Bonjour,</p>
                <p>Vous avez un nouveau message '.$parent -> getNom().'</p> 
              <p>A bientôt,</p><p>L\'équipe Nid des anges</p>','text/html'
        );

        $mailer = $this->get('mailer'); 
        $mailer->send($message);
        $this->get('session')->getFlashBag()->add('messagerie.success','un mail a été envoyé à '.$parent ->getNom());
        return $this->redirectToRoute('nouveaumessage');
  } 

        return $this->render('BackBundle:Communiquer:nouveaumessage.html.twig',array(
          'form' => $form->createView()));
}        
}
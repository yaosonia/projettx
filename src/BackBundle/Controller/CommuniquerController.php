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
use BackBundle\Form\CommuniquerParentType;
use BackBundle\Repository\CommuniquerRepository;


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
            if ($user === null) 
            {
                return $this->redirect($this->generateUrl('fos_user_security_logout'));
            }
          
              # Création d'un objet qui fait réference à la classe Communiquer
              $communiquer = new Communiquer();
              $parent = new Parents();
              
            #$communiquer->setProfesseur( $user);
            $form = $this->createForm('BackBundle\Form\CommuniquerType', $communiquer);     
           
              # Handle form response
            $form->handleRequest($request);
            $sn = $this->getDoctrine()->getManager();

            #Appel à la fonction de count
            $email = $user->getEmail();
            $nbremessagerecuprofesseur= $sn->getRepository('BackBundle:Communiquer')->nbremessagerecuprofesseur($email, 1);

              # check if form is submitted, recuperer les données dans des variables
            if($form->isSubmitted() &&  $form->isValid()){
             
              #Récuperer l'utilisateur current avec son adresse mail
              $email = $user->getEmail();
              $sn = $this->getDoctrine()->getManager();
          
              $professeur = $sn->getRepository('UserBundle:Professeur')->findOneByEmail($email);
      
              $communiquer->setProfesseur($professeur);
              
              #Reconnaitre qui envoie le message
              $communiquer->setIsprofesseursend(true);
              
              // getData();
              $parent = $form['parents']->getData();
                
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
          'form' => $form->createView(),
          'nbremessagerecuprofesseur' => $nbremessagerecuprofesseur,
        ));
         
} 


              public function messageenvoyerAction()
              {
                # L'utilisateur doit toujours s'authentifier
                    $user = $this->getUser();
                //verification de l'existance du user
                    if ($user === null) {
                        return $this->redirect($this->generateUrl('fos_user_security_logout'));
                    }

                    $sn = $this->getDoctrine()->getManager();
                    $email = $user->getEmail(); 
                    $communiquer = $sn->getRepository('BackBundle:Communiquer')->professeurmessageenvoyer($email,1);
                    $nbremessagerecuprofesseur= $sn->getRepository('BackBundle:Communiquer')->nbremessagerecuprofesseur($email, 1);
                   
                return $this->render('BackBundle:Communiquer:messageenvoyer.html.twig',array(
                    'communiquer'  => $communiquer,
                    'nbremessagerecuprofesseur' => $nbremessagerecuprofesseur
                ));
              }

              public function messagerecuAction()
              {
                    # L'utilisateur doit toujours s'authentifier
                    $user = $this->getUser();

                    //verification de l'existance du user
                    if ($user === null) {
                        return $this->redirect($this->generateUrl('fos_user_security_logout'));
                    }
                    #Récuperer l'utilisateur current avec son adresse mail
                    
                    $sn = $this->getDoctrine()->getManager();
                    #$nbrmessageenvoye = $sn->getRepository('BackBundle:Communiquer')->nbremessageenvoye();
                    $email = $user->getEmail();
                    $communiquer= $sn->getRepository('BackBundle:Communiquer')->professeurmessagerecu($email, 1);
                    $nbremessagerecuprofesseur= $sn->getRepository('BackBundle:Communiquer')->nbremessagerecuprofesseur($email, 1);
                  
                  return $this->render('BackBundle:Communiquer:messagerecu.html.twig',array(
                        'communiquer'  => $communiquer,
                        'nbremessagerecuprofesseur' => $nbremessagerecuprofesseur
                    ));
              }

                //suppression
                public function deletemessageenvoyerprofAction(Request $request, $id)
              {
                  $user = $this->getUser();
                  if ($user === null) {
                      return $this->redirect($this->generateUrl('fos_user_security_logout'));
                  }
                  $sn = $this->getDoctrine()->getManager();
                  $communiquer = $sn->getRepository('BackBundle:Communiquer')->find($id);
                      $sn->remove($communiquer);
                      $sn->flush();
                      return $this->redirect($this->generateUrl('messageenvoyer'));

              }

              public function deletemessagerecuprofAction(Request $request, $id)
              {
                  $user = $this->getUser();
                  if ($user === null) {
                      return $this->redirect($this->generateUrl('fos_user_security_logout'));
                  }
                  $sn = $this->getDoctrine()->getManager();
                  $communiquer = $sn->getRepository('BackBundle:Communiquer')->find($id);
                      $sn->remove($communiquer);
                      $sn->flush();
                      return $this->redirect($this->generateUrl('messagerecu'));

              }

              public function liremessageenvoyerAction(Request $request, $id)
              {
                 # L'utilisateur doit toujours s'authentifier
                     $user = $this->getUser();
                 //verification de l'existance du user
                    if ($user === null) {
                        return $this->redirect($this->generateUrl('fos_user_security_logout'));
                    }
                    $sn = $this->getDoctrine()->getManager(); 
                    $email = $user->getEmail();
                    $communiquer = $sn->getRepository('BackBundle:Communiquer')->find($id);
                    $nbremessagerecuprofesseur= $sn->getRepository('BackBundle:Communiquer')->nbremessagerecuprofesseur($email, 1);
               
                 return $this->render('BackBundle:Communiquer:liremessageenvoyer.html.twig',array(
                  'communiquer'  => $communiquer,
                  'nbremessagerecuprofesseur' => $nbremessagerecuprofesseur
              ));
            }
              public function liremessagerecuAction(Request $request, $id)
              {
                 # L'utilisateur doit toujours s'authentifier
                     $user = $this->getUser();
                 //verification de l'existance du user
                    if ($user === null) {
                        return $this->redirect($this->generateUrl('fos_user_security_logout'));
                    }
                    $sn = $this->getDoctrine()->getManager(); 
                    $email = $user->getEmail();
                    $communiquer = $sn->getRepository('BackBundle:Communiquer')->find($id);
                    $nbremessagerecuprofesseur= $sn->getRepository('BackBundle:Communiquer')->nbremessagerecuprofesseur($email, 1);
               
                 return $this->render('BackBundle:Communiquer:liremessagerecu.html.twig',array(
                  'communiquer'  => $communiquer,
                  'nbremessagerecuprofesseur' => $nbremessagerecuprofesseur
              ));
              }
   

#################################### GESTION DES PARENTS #########################################################################

              public function nouveaumessageparentAction(Request $request)
              {
                    # L'utilisateur doit toujours s'authentifier
                    $user = $this->getUser();
                      //verification de l'existance du user
                      if ($user === null) 
                      {
                          return $this->redirect($this->generateUrl('fos_user_security_logout'));
                      }
                    
                        # Création d'un objet qui fait réference à la classe Communiquer
                        $communiquer = new Communiquer();
                        $professeur = new Professeur();
                        
                      #$communiquer->setProfesseur( $user);
                      $form = $this->createForm('BackBundle\Form\CommuniquerParentType', $communiquer);     
                   
                        # Handle form response
                      $form->handleRequest($request);
          
                        # check if form is submitted, recuperer les données dans des variables
                      if($form->isSubmitted() &&  $form->isValid()){
                       
                        #Récuperer l'utilisateur current avec son adresse mail
                        $email = $user->getEmail();
                        $sn = $this->getDoctrine()->getManager();
                        $parent = $sn->getRepository('UserBundle:Parents')->findOneByEmail($email);
                        $communiquer->setParents($parent);
                        
                        #Reconnaitre qui envoie le message
                        $communiquer->setIsparentsend(true);
                        
                        // getData();
                        $professeur = $form['professeur']->getData();
                     
                        $sn -> persist($communiquer);
                        $sn -> flush();
                        
                        #Send copie of the message in own address mail
                        $message =  \Swift_Message::newInstance()
                              ->setSubject('Notification de la messagerie NID DES ANGES | Ne pas repondre')
                              ->setFrom('nis.desanges2021@gmail.com')
                              ->setTo($professeur->getEmail())
                              ->setBody(
                                '<p>Bonjour,</p>
                                      <p>Vous avez un nouveau message '.$professeur->getNom().'</p> 
                                    <p>A bientôt,</p><p>L\'équipe Nid des anges</p>','text/html'
                                      );
          
                        $mailer = $this->get('mailer'); 
                        $mailer->send($message);
                        $this->get('session')->getFlashBag()->add('messagerie.success','un mail a été envoyé à '.$professeur->getNom());
                        return $this->redirectToRoute('nouveaumessageparent');
                  } 
          
                  return $this->render('BackBundle:CommuniquerParent:nouveaumessageparent.html.twig',array(
                    'form' => $form->createView()));
          } 
          
         
          public function messageenvoyerparentAction()
          {
             # L'utilisateur doit toujours s'authentifier
                 $user = $this->getUser();
             //verification de l'existance du user
                if ($user === null) {
                    return $this->redirect($this->generateUrl('fos_user_security_logout'));
                }
      
                $sn = $this->getDoctrine()->getManager(); 
                $email = $user->getEmail();
                $communiquer = $sn->getRepository('BackBundle:Communiquer')->parentmessageenvoyer($email,1);
                $nbremessagerecuparent = $sn->getRepository('BackBundle:Communiquer')->nbremessagerecuparent($email, 1);
               
             return $this->render('BackBundle:CommuniquerParent:messageenvoyerparent.html.twig',array(
                 'communiquer'  => $communiquer,
                 'nbremessagerecuparent'=> $nbremessagerecuparent
             ));
          }    
            
             public function messagerecuparentAction()
                  {
                    # L'utilisateur doit toujours s'authentifier
                    $user = $this->getUser();
      
                    //verification de l'existance du user
                    if ($user === null) {
                        return $this->redirect($this->generateUrl('fos_user_security_logout'));
                    }
                     #Récuperer l'utilisateur current avec son adresse mail
                    
                    $sn = $this->getDoctrine()->getManager();
                    #$nbrmessageenvoye = $sn->getRepository('BackBundle:Communiquer')->nbremessageenvoye();
                    $email = $user->getEmail();
                    $communiquer= $sn->getRepository('BackBundle:Communiquer')->parentmessagerecu($email, 1);
                    $nbremessagerecuparent = $sn->getRepository('BackBundle:Communiquer')->nbremessagerecuparent($email, 1);
                   
                   
                   return $this->render('BackBundle:CommuniquerParent:messagerecuparent.html.twig',array(
                        'communiquer'  => $communiquer,
                        'nbremessagerecuparent'=> $nbremessagerecuparent
                    ));
                  }

                       //suppression dans messages envoyés
                       public function deletemessageenvoyerAction(Request $request, $id)
                       {
                           $user = $this->getUser();
                           if ($user === null) {
                               return $this->redirect($this->generateUrl('fos_user_security_logout'));
                           }
                           $sn = $this->getDoctrine()->getManager();
                           $communiquer = $sn->getRepository('BackBundle:Communiquer')->find($id);
                               $sn->remove($communiquer);
                               $sn->flush();
                               return $this->redirect($this->generateUrl('messageenvoyerparent'));
                       }
   
                        //suppression dans messages réçu
                        public function deletemessagerecuAction(Request $request, $id)
                        {
                            $user = $this->getUser();
                            if ($user === null) {
                                return $this->redirect($this->generateUrl('fos_user_security_logout'));
                            }
                            $sn = $this->getDoctrine()->getManager();
                            $communiquer = $sn->getRepository('BackBundle:Communiquer')->find($id);
                                $sn->remove($communiquer);
                                $sn->flush();
                                return $this->redirect($this->generateUrl('messagerecuparent'));  
         
                       }


                    public function liremessageenvoyerparentAction(Request $request, $id)
                    {
                       # L'utilisateur doit toujours s'authentifier
                           $user = $this->getUser();
                       //verification de l'existance du user
                          if ($user === null) {
                              return $this->redirect($this->generateUrl('fos_user_security_logout'));
                          }
                          $sn = $this->getDoctrine()->getManager(); 
                          $email = $user->getEmail();
                          $communiquer = $sn->getRepository('BackBundle:Communiquer')->find($id);
                          $nbremessagerecuparent = $sn->getRepository('BackBundle:Communiquer')->nbremessagerecuparent($email, 1);
                     
                       return $this->render('BackBundle:CommuniquerParent:liremessageenvoyerparent.html.twig',array(
                        'communiquer'  => $communiquer,
                        'nbremessagerecuparent' => $nbremessagerecuparent
                    ));
                  }
                    public function liremessagerecuparentAction(Request $request, $id)
                    {
                       # L'utilisateur doit toujours s'authentifier
                           $user = $this->getUser();
                       //verification de l'existance du user
                          if ($user === null) {
                              return $this->redirect($this->generateUrl('fos_user_security_logout'));
                          }
                          $sn = $this->getDoctrine()->getManager(); 
                          $email = $user->getEmail();
                          $communiquer = $sn->getRepository('BackBundle:Communiquer')->find($id);
                          $nbremessagerecuparent = $sn->getRepository('BackBundle:Communiquer')->nbremessagerecuparent($email, 1);
                     
                       return $this->render('BackBundle:CommuniquerParent:liremessagerecuparent.html.twig',array(
                        'communiquer'  => $communiquer,
                        'nbremessagerecuparent' => $nbremessagerecuparent
                    ));
                    }
         
              
}
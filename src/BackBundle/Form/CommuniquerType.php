<?php

// /src/BackBundle/Form/CommuniquerType.php
namespace BackBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use UserBundle\Entity\Parents;
use UserBundle\Entity\Professeur;

class CommuniquerType extends AbstractType
{
   /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */

     public function buildForm(FormBuilderInterface $builder, array $options)
    {
      
      # Creation des champs
      $builder
        ->add('professeur', EntityType::class, array('class'=>'UserBundle:Professeur','choice_label'=>'nom','placeholder'=>'De', ))
        ->add('parents', EntityType::class, array('class'=>'UserBundle:Parents','choice_label'=>'nom','placeholder'=>'A',))     
        ->add('objet', TextType::class, array('label'=> 'objet','attr' => array('class' => 'form-control', 'style' => 'margin-bottom:10px','placeholder'=>'objet')))
        ->add('contenumessage', TextareaType::class, array('label'=> 'contenumessage','attr' => array('class' => 'form-control','style' =>'height: 200px')));
        #->add('datemessage', DateTimeType::class, array('label'=> 'datemessage', 'placeholder' => ['year' => 'Annee', 'month' => 'Mois', 'day' => 'Jour', 'hour' => 'Heure', 'minute' => 'Minute', 'second' => 'Seconde',]));
        #->add('Save', SubmitType::class, array('label'=> 'Envoyer', 'attr' => array('class' => 'btn btn-primary', 'style' => 'margin-top:15px')));

    }
    }
<?php

namespace BackBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use \Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class PaiementType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder
        ->add('libellepaiement', TextType::class, array('required' => true, 'attr' => array('class' => 'form-control', 'name'=>'libellepaiement', "autocomplete"=>"off", 'placeholder' => 'Libelle paiement*')))
        ->add('reduction', TextType::class, array('required' => false, 'attr' => array('class' => 'form-control', 'name'=>'reduction', "autocomplete"=>"off", 'placeholder' => 'Réduction')))
        ->add('datepaiement',  DateTimeType::class, array(
            'attr' => array(
                'class' => 'datepicker',
                'data-provide' => 'datepicker',                               
                'format' => 'dd-mm-yyyy'),
        )) 
        ->add('formation',EntityType::class, array(
        'class'=>'BackBundle:Formation',
        'choice_label'=>'libelleformation',
        'placeholder'=>"Formation"));  
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'BackBundle\Entity\Paiement'
        ));
    }
}

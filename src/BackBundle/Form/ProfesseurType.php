<?php

namespace BackBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use \Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class ProfesseurType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder
           ->add('civilite', ChoiceType::class, array(
                    'choices' => array(
                        'Monsieur' => 'Monsieur',
                        'Madame' => 'Madame',
                        'Mademoiselle' => 'Mademoiselle',
                    ),
                    'attr' => ['custom-select' => 'true']
                ))
            ->add('roles', ChoiceType::class, [
                    'choices' => [
                        'Professeur' => 'ROLE_PROF',
                        'Parent' => 'ROLE_PARENT',
                        'Administrateur' => 'ROLE_ADMIN'
                    ],
                    'expanded' => true,
                    'multiple' => true,
                    'label' => 'Rôles' 
                ])
           ->add('nom', TextType::class, array('required' => TRUE, 'attr' => array('class' => 'form-control', 'name'=>'nom', "autocomplete"=>"off", 'placeholder' => 'nom*')))
           ->add('prenom', TextType::class, array('required' => TRUE, 'attr' => array('class' => 'form-control', 'name'=>'prenom', "autocomplete"=>"off", 'placeholder' => 'prenom*')))
           ->add('email', TextType::class, array('required' => TRUE, 'attr' => array('class' => 'form-control', 'name'=>'email', "autocomplete"=>"off", 'placeholder' => 'email*')))
           ->add('numerovoie', TextType::class, array('required' => TRUE, 'attr' => array('class' => 'form-control', 'name'=>'prenom', "autocomplete"=>"off", 'placeholder' => 'numerovoie*')))
           ->add('nomvoie', TextType::class, array('required' => TRUE, 'attr' => array('class' => 'form-control', 'name'=>'prenom', "autocomplete"=>"off", 'placeholder' => 'nomvoie*')))
           ->add('codepostal', IntegerType::class, array('required' => TRUE, 'attr' => array('class' => 'form-control', 'name'=>'prenom', "autocomplete"=>"off", 'placeholder' => 'codepostal*')))
            ->add('ville', TextType::class, array('required' => TRUE, 'attr' => array('class' => 'form-control', 'name'=>'prenom', "autocomplete"=>"off", 'placeholder' => 'ville*')))
             ->add('pays', TextType::class, array('required' => TRUE, 'attr' => array('class' => 'form-control', 'name'=>'pays', "autocomplete"=>"off", 'placeholder' => 'pays*')))
           ->add('telephone', IntegerType::class, array('required' => TRUE, 'attr' => array('class' => 'form-control', 'name'=>'telephone', "autocomplete"=>"off", 'placeholder' => 'telephone*')));
          
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'UserBundle\Entity\Professeur'
        ));
    }
}

<?php

namespace UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use \Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;



class UtilisateurType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder
            ->add('civilité', ChoiceType::class, array(
                        'choices' => array(
                            'Madame' => 'Madame',
                            'Monsieur' => 'Monsieur',
                            'Mademoiselle' => 'Mademoiselle',
                        ),
                        'attr' => ['data-select' => 'true']
                    ))
            ->add('nom', TextType::class, array('required' => TRUE, 'attr' => array('class' => 'input100', 'name'=>'nom', "autocomplete"=>"off", 'placeholder' =>'Nom')))
            ->add('prenom', TextType::class, array('required' => TRUE, 'attr' => array('class'=>'input100', 'name'=>'prenom', "autocomplete"=>"off", 'placeholder' =>'Prénom')))
            
            ->add('numerovoie', IntegerType::class, array('required' => TRUE, 'attr' => array('class' => 'input100', 'name'=>'numerovoie', "autocomplete"=>"off", 'placeholder' =>'Numéro voie')))
            ->add('nomvoie', TextType::class, array('required' => TRUE, 'attr' => array('class'=>'input100', 'name'=>'nomvoie', "autocomplete"=>"off", 'placeholder' =>'Nom voie')));
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'UserBundle\Entity\Utilisateur'
        ));
    }

    public function getParent(){
         return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getBlockPrefix(){
           return 'app_user_registration';
        }

   public function getName(){
       return $this->getBlockPrefix();
   }

}
 

<?php

namespace BackBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use \Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use \Symfony\Component\Form\Extension\Core\Type\TextareaType;



class FormationType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder
            ->add('libelleformation', TextType::class, array('required' => TRUE, 'attr' => array('class' => 'form-control', 'name'=>'libelleformation', "autocomplete"=>"off", 'placeholder' => 'Libellé')))
            ->add('descriptionformation', TextareaType::class, array('required' => FALSE, 'attr' => array('class' => 'form-control', 'name'=>'descriptionformation', "autocomplete"=>"off", 'placeholder' => 'Description')))
            ->add('prix', TextType::class, array('required' => TRUE, 'attr' => array('class' => 'form-control', 'name'=>'prix', "autocomplete"=>"off", 'placeholder' => 'Prix')));
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'BackBundle\Entity\Formation'
        ));
    }
}

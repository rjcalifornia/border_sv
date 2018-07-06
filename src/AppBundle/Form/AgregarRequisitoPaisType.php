<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;   
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;


class AgregarRequisitoPaisType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                
                ->add('paisid', 
              EntityType::class, 

                        array(
                            'class' => \AppBundle\Entity\Paises::class,
                            'choice_label' => 'paisnombre',
                            'choice_value' => 'id',
                            'placeholder'=> 'Seleccione un pais',
                            "attr" => array
                            ('class' => 'seleccionar-pais form-control col-md-7 col-xs-12')
                            ))

                
                
                
                ->add('codigointerno', 
                    TextType::class, 
                    array(
                        "attr" => array
                        ('class' => 'form-control col-md-7 col-xs-12', 'placeholder'=>false)))
                

                ->add('pasaportedestino', 
                    TextareaType::class, 
                    array(
                        "attr" => array
                        ('class' => 'form-control col-md-7 col-xs-12', 'placeholder'=>false)))

                
                ->add('visadestino', 
                    TextareaType::class, 
                    array(
                        "attr" => array
                        ('class' => 'form-control col-md-7 col-xs-12', 'placeholder'=>false)))
                
                
                
                ->add('destinosalud', 
                    TextareaType::class, 
                    array(
                        "attr" => array
                        ('class' => 'form-control col-md-7 col-xs-12', 'placeholder'=>false)))
                
                
                
                
                
                ->add('mapa', FileType::class, array(
                    'label' => 'Mapa:', 
                    'mapped'=> false,
                    'required'   => true, 
                    "attr" => array('accept'=>'application/png'),
                    'data_class' => null))
                     
            ->add('guardar', SubmitType::class, 
                    array('label' => 'Registrar', 
                        "attr" => array('class' => 'btn btn-success')))
            
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Requisitosviaje'
        ));
    }
}

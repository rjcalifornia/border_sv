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


class AgregarConsuladoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                
                

                ->add('categoriaredconsular', 
              EntityType::class, 

                        array(
                            'class' => \AppBundle\Entity\Categoriaconsular::class,
                            'choice_label' => 'categorianombre',
                            'choice_value' => 'id',
                            'placeholder'=> 'Seleccione una categoria (Ordinario)',
                            "attr" => array
                            ('class' => 'select2 form-control col-md-7 col-xs-12')
                            ))

                
                
                
                
                ->add('nombre', 
                    TextAreaType::class, 
                    array(
                        "attr" => array
                        ('class' => 'form-control col-md-7 col-xs-12', 'placeholder'=>false)))
                
                 ->add('jurisdiccion', 
                    TextAreaType::class, 
                    array(
                        "attr" => array
                        ('class' => 'form-control col-md-7 col-xs-12', 'required'=> false, 'placeholder'=>false)))
                
                
                 ->add('personal', 
                    TextAreaType::class, 
                    array(
                        "attr" => array
                        ('class' => 'form-control col-md-7 col-xs-12', 'placeholder'=>false)))
                
                
                ->add('direccion', 
                    TextAreaType::class, 
                    array(
                        "attr" => array
                        ('class' => 'form-control col-md-7 col-xs-12', 'placeholder'=>false)))
                
                ->add('telefono', 
                    TextType::class, 
                    array(
                        "attr" => array
                        ('class' => 'form-control col-md-7 col-xs-12', 'placeholder'=>false)))
                
                
                
                ->add('ciudad', 
                    TextType::class, 
                    array(
                        "attr" => array
                        ('class' => 'form-control col-md-7 col-xs-12', 'placeholder'=>false)))
                
                ->add('informacionconsulado', 
                    TextAreaType::class, 
                    array(
                        "attr" => array
                        ('class' => 'form-control col-md-7 col-xs-12', 'required'=> false, 'placeholder'=>false)))
                
                ->add('informacionadicional', 
                    TextAreaType::class, 
                    array(
                        "attr" => array
                        ('class' => 'form-control col-md-7 col-xs-12', 'required'=> false, 'placeholder'=>false)))
                
                ->add('correo', 
                    TextType::class, 
                    array(
                        "attr" => array
                        ('class' => 'form-control col-md-7 col-xs-12', 'required'=> false, 'placeholder'=>false)))
                
               
                
                
                     
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
            'data_class' => 'AppBundle\Entity\Consulados'
        ));
    }
}

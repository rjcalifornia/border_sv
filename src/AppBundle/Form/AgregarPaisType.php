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


class AgregarPaisType extends AbstractType
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
                            ('class' => 'select2 form-control col-md-7 col-xs-12')
                            ))

                ->add('categoriaordinarioid', 
              EntityType::class, 

                        array(
                            'class' => \AppBundle\Entity\Categoriapaises::class,
                            'choice_label' => 'categorianombre',
                            'choice_value' => 'id',
                            'placeholder'=> 'Seleccione una categoria (Ordinario)',
                            "attr" => array
                            ('class' => 'select2 form-control col-md-7 col-xs-12')
                            ))

                ->add('categoriadiplomaticoid', 
               EntityType::class, 

                    array(
                        'class' => \AppBundle\Entity\Categoriapaises::class,
                        'choice_label' => 'categorianombre',
                        'choice_value' => 'id',
                        'placeholder'=> 'Seleccione una categoria (Diplomatico)',
                        "attr" => array
                        ('class' => 'select2 form-control col-md-7 col-xs-12')
                        ))
                
                
                
                ->add('capital', 
                    TextType::class, 
                    array(
                        "attr" => array
                        ('class' => 'form-control col-md-7 col-xs-12', 'placeholder'=>false)))
                
                
                
                
                ->add('superficie', 
                    TextType::class, 
                    array(
                        "attr" => array
                        ('class' => 'form-control col-md-7 col-xs-12', 'placeholder'=>false)))
                
                ->add('idioma', 
                    TextType::class, 
                    array(
                        "attr" => array
                        ('class' => 'form-control col-md-7 col-xs-12', 'placeholder'=>false)))
                
                ->add('gentilicio', 
                    TextType::class, 
                    array(
                        "attr" => array
                        ('class' => 'form-control col-md-7 col-xs-12', 'placeholder'=>false)))
                
                ->add('formagobierno', 
                    TextType::class, 
                    array(
                        "attr" => array
                        ('class' => 'form-control col-md-7 col-xs-12', 'placeholder'=>false)))
                
                ->add('legislacion', 
                    TextType::class, 
                    array(
                        "attr" => array
                        ('class' => 'form-control col-md-7 col-xs-12', 'placeholder'=>false)))
                
                ->add('moneda', 
                    TextType::class, 
                    array(
                        "attr" => array
                        ('class' => 'form-control col-md-7 col-xs-12', 'placeholder'=>false)))
                
                ->add('poblacion', 
                    TextType::class, 
                    array(
                        "attr" => array
                        ('class' => 'form-control col-md-7 col-xs-12', 'placeholder'=>false)))
                
                
                ->add('codigoiso', 
                    TextType::class, 
                    array(
                        "attr" => array
                        ('class' => 'form-control', 'placeholder'=>false)))
                
                ->add('observaciones', 
                    TextAreaType::class, 
                    array(
                        "attr" => array
                        ('class' => 'form-control', 'placeholder'=>false)))
                
                ->add('mapapais', FileType::class, array(
                    'label' => 'Mapa:', 
                    'mapped'=> false,
                    'required'   => true, 
                    "attr" => array('accept'=>'application/png'),
                    'data_class' => null))
                
                ->add('banderapais', FileType::class, array(
                    'label' => 'Bandera:', 
                    'mapped'=> false,
                    'required'   => true, 
                    "attr" => array('accept'=>'application/png'),
                    'data_class' => null))
                     
            ->add('guardar', SubmitType::class, 
                    array('label' => 'Registrar', 
                        "attr" => array('class' => 'btn btn-success')))
            /** ->add('centrovotacion', 
              EntityType::class, 

                                array(
                                    'class' => \AppBundle\Entity\Centrovotacion::class,
                            'choice_label' => 'nombrecentro',
                            'choice_value' => 'id',
                                    'placeholder'=> 'Seleccione Centro de Votacion',
                                    "attr" => array
                                    ('class' => 'select2_single form-control')
                                    ))
          
            ->add('jrv', 
              TextType::class, 
                    array(
                       'required'   => true,
                        "attr" => array
                        ('class' => 'form-control', 'placeholder'=>false)))
                
                
                
            ->add('demandanumero', 
                    TextType::class, 
                    array(
                       
                        "attr" => array
                        ('class' => 'form-control', 'placeholder'=>false)))
                
            ->add('nombre', 
                    TextType::class, 
                    array("attr" => array
                        ('class' => 'form-control',  'placeholder'=>false)))
                
            ->add('demandantes', 
                    TextType::class, 
                    array(
                        'required'   => false,
                        "attr" => array
                        ('class' => 'form-control',  'placeholder'=>false)))
            
            ->add('autoridadesdemandadas', 
                    TextType::class, 
                    array(
                        'required'   => false,
                        "attr" => array
                        ('class' => 'form-control',  'placeholder'=>false)))
                
                
            ->add('intervinientes', 
                    TextType::class, 
                    array(
                        'required'   => false,
                        "attr" => array
                        ('class' => 'form-control',  'placeholder'=>false)))
                
            ->add('contenido', 
                    TextareaType::class, 
                    array(
                        'required'   => false,
                        "attr" => array
                        ('class' => 'form-control no-resize', 'rows' =>'4')))
                
            ->add('fecha', DateType::class, array(
                        'widget'=> 'single_text',
                    "attr" => array
                            ('class' => 'datepicker form-control')

                ))
                
                
            ->add('archivodemanda', FileType::class, array(
                'label' => 'Auto de Admision:', 
                'required'   => true, 
                "attr" => array('accept'=>'application/pdf'),
                'data_class' => null))
                
            
                
            ->add('guardar', SubmitType::class, 
                    array('label' => 'Registrar', 
                        "attr" => array('class' => 'btn btn-primary m-t-15 waves-effect')))

                
                 * 
                 */
            
           
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Infopais'
        ));
    }
}

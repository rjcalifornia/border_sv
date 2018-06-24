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


class AgregarPasaporteType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                
                

                ->add('categoriapasaporteid', 
              EntityType::class, 

                        array(
                            'class' => \AppBundle\Entity\Categoriapasaporte::class,
                            'choice_label' => 'categorianombre',
                            'choice_value' => 'id',
                            'placeholder'=> 'Seleccione una categoria',
                            "attr" => array
                            ('class' => 'select2 form-control col-md-7 col-xs-12')
                            ))

                
               ->add('nombrepasaporte', FileType::class, array(
                    'label' => 'Mapa:',
                   'data_class' => null,
                   'multiple' => true,
                    'required'   => true, 
                    "attr" => array('accept'=>'application/png'),
                    'data_class' => null))
                
                
                     
            ->add('guardar', SubmitType::class, 
                    array('label' => 'Almacenar documentos en el sistema', 
                        "attr" => array('class' => 'btn btn-success')))
           
            
           
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Pasaporte'
        ));
    }
}

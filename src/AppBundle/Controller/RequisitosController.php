<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\AbstractType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Requisitosviaje;
use AppBundle\Form\AgregarRequisitoPaisType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;   
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class RequisitosController extends Controller
{
    /**
     * @Route("/requisitos/listado-general/", name="requisitos_listado_general")
     */
    public function ListadoCodigosAction(Request $request)
    {
         
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT n 
                FROM AppBundle:Requisitosviaje n
                ORDER BY n.id ASC');
        $data['pais'] = $query->getResult();
        
         return $this->render('AppBundle:Requisitos:ver-listado-general.html.twig', array('data'=> $data));
    }
    
    
    /**
     * @Route("/requisitos/agregar-nuevo-requisitos-pais/", name="requisitos_agregar_nuevo_pais")
     */
    public function AgregarAction(Request $request)
    {
        $requisitoviaje = new Requisitosviaje();
        $requiRepository = $this->getDoctrine()->getRepository('AppBundle:Requisitosviaje');
        
        $listado = $requiRepository->createQueryBuilder("r")
        ->select('IDENTITY(r.paisid)')
        ->getQuery()
        ->getResult();
        
        $requisitosRepository = $this->getDoctrine()->getRepository('AppBundle:Paises');

         $paises = $requisitosRepository->createQueryBuilder("q")
                ->where("q.id NOT IN (:mispaises)")
                ->setParameter("mispaises", $listado)
                ->getQuery()
                ->getResult();
        
        
         $form = $this->createFormBuilder($requisitoviaje);
         $form->add('paisid', 
              EntityType::class, 

                        array(
                            'class' => \AppBundle\Entity\Paises::class,
                            'choice_label' => 'paisnombre',
                           // 'choice_value' => 'id',
                            'placeholder'=> 'Seleccione un pais',
                            'choices' => $paises,
                            "attr" => array
                            ('class' => 'seleccionar-pais form-control col-md-7 col-xs-12')
                            ));

                
                
                
                $form->add('codigointerno', 
                    TextType::class, 
                    array(
                        "attr" => array
                        ('class' => 'form-control col-md-7 col-xs-12', 'placeholder'=>false)));
                

                $form->add('pasaportedestino', 
                    TextareaType::class, 
                    array(
                        "attr" => array
                        ('class' => 'form-control col-md-7 col-xs-12', 'placeholder'=>false)));

                
                $form->add('visadestino', 
                    TextareaType::class, 
                    array(
                        "attr" => array
                        ('class' => 'form-control col-md-7 col-xs-12', 'placeholder'=>false)));
                
                
                
                $form->add('destinosalud', 
                    TextareaType::class, 
                    array(
                        "attr" => array
                        ('class' => 'form-control col-md-7 col-xs-12', 'placeholder'=>false)));
                
                
                
                
                
                $form->add('mapa', FileType::class, array(
                    'label' => 'Mapa:', 
                    'mapped'=> false,
                    'required'   => true, 
                    "attr" => array('accept'=>'application/png'),
                    'data_class' => null));
                     
            $form->add('guardar', SubmitType::class, 
                    array('label' => 'Registrar', 
                        "attr" => array('class' => 'btn btn-success')));
          $form =  $form->getForm();
        
        $form->handleRequest($request);
        // replace this example code with whatever you need
        if ($form->isSubmitted() && $form->isValid()) 
            {
        
        $informacion = $form->getData();
        $user = $this->getUser();
        $informacion->setUseradic($user);
        $informacion->setFechaadic(new \DateTime('now'));
        
        $mapa = $form['mapa']->getData();
        
        if ($mapa != null)
        {
            // $fileName = md5(uniqid()).'.'.$file->guessExtension();
             $fileNames = $mapa->getClientOriginalName();

             $mapa->move(
                 $this->getParameter('mapas_requisitos_directory'),
                 $fileNames
        );
        
             $informacion->setMapa($fileNames);
        // ... perform some action, such as saving the task to the database
        // for example, if Task is a Doctrine entity, save it!
        $em = $this->getDoctrine()->getManager();
        $em->persist($informacion);
        $em->flush();
        
             
        }
        
        
        

        return $this->redirectToRoute('requisitos_listado_general');
    }
         return $this->render('AppBundle:Requisitos:agregar-nuevo-requisito-pais.html.twig',
                 array('form'=> $form->createView()));
    
        
    }
    
    
      /**
     * @Route("/requisitos/editar-informacion/", name="requisitos_editar_informacion")
     */
    public function editarRequisitosPaisAction(Request $request)
    {
        $id = $request->query->get('id');
         $requisitosRepository = $this->getDoctrine()
                                 ->getRepository('AppBundle:Requisitosviaje');
        $requisitosPais    = $requisitosRepository->findOneBy(array('id'=>"$id"));
        
        //Llamamos al formulario para agregar un nuevo consulado y le pasamos la entidad
        $form = $this->createForm(AgregarRequisitoPaisType::class, $requisitosPais);
        $form->handleRequest($request);
        // replace this example code with whatever you need
        if ($form->isSubmitted() && $form->isValid()) 
        {
        $informacion = $form->getData();
        $user = $this->getUser();
        $informacion->setUseradic($user);
        $informacion->setFechaadic(new \DateTime('now'));
        
        $mapa = $form['mapa']->getData();
        
            if ($mapa != null)
            {
                // $fileName = md5(uniqid()).'.'.$file->guessExtension();
                 $fileNames = $mapa->getClientOriginalName();

                 $mapa->move(
                     $this->getParameter('mapas_requisitos_directory'),
                     $fileNames
            );

                 $informacion->setMapa($fileNames);
            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            $em = $this->getDoctrine()->getManager();
            $em->persist($informacion);
            $em->flush();
            
            

            }
        
            return $this->redirectToRoute('requisitos_ver_informacion', 
                    array(
                        'id'=>$id,
                    ));
        
        }
        
        return $this->render('AppBundle:Requisitos:editar-requisitos-pais.html.twig', 
                array('form'=> $form->createView()));
    }
    
    
     /**
     * @Route("/requisitos/ver-informacion/", name="requisitos_ver_informacion")
     */
    public function VerRequisitosPaisAction(Request $request)
    {
         $id = $request->query->get('id');
         $requisitosRepository = $this->getDoctrine()
                                 ->getRepository('AppBundle:Requisitosviaje');
        $requisitosPais    = $requisitosRepository->findOneBy(array('id'=>"$id"));
        
        
       
        
         return $this->render('AppBundle:Requisitos:ver-informacion-pais.html.twig', 
                 array('informacion'=> $requisitosPais));
    }
}

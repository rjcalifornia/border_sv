<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Infopais;
use AppBundle\Entity\Mapas;
use AppBundle\Entity\Banderas;
use AppBundle\Form\AgregarPaisType;

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

class PaisesController extends Controller
{
    /**
     * @Route("/paises/agregar-nuevo/", name="paises_agregar_nuevo")
     */
    public function AgregarAction(Request $request)
    {
        $pais = new Infopais();
        
         $categoriasRepository = $this->getDoctrine()->getRepository('AppBundle:Infopais');
        
        $listado = $categoriasRepository->createQueryBuilder("r")
        ->select('IDENTITY(r.paisid)')
        ->getQuery()
        ->getResult();
        
        $requisitosRepository = $this->getDoctrine()->getRepository('AppBundle:Paises');

         $paises = $requisitosRepository->createQueryBuilder("q")
                ->where("q.id NOT IN (:mispaises)")
                ->setParameter("mispaises", $listado)
                ->getQuery()
                ->getResult();
        
         
         
         
        $form = $this->createFormBuilder($pais);
        
        $form  ->add('paisid', 
              EntityType::class, 

                        array(
                            'class' => \AppBundle\Entity\Paises::class,
                            'choice_label' => 'paisnombre',
                            //'choice_value' => 'id',
                            'choices' => $paises,
                            'placeholder'=> 'Seleccione un pais',
                            "attr" => array
                            ('class' => 'seleccionar-pais form-control col-md-7 col-xs-12')
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
                        "attr" => array('class' => 'btn btn-success')));
        
        $form =  $form->getForm();
        
        //$form = $this->createForm(AgregarPaisType::class, $pais);
        $form->handleRequest($request);
        // replace this example code with whatever you need
        if ($form->isSubmitted() && $form->isValid()) {
        // $form->getData() holds the submitted values
        // but, the original `$task` variable has also been updated
        $informacion = $form->getData();
        $user = $this->getUser();
        $informacion->setUseradic($user);
        $informacion->setFechaadic(new \DateTime('now'));
        // ... perform some action, such as saving the task to the database
        // for example, if Task is a Doctrine entity, save it!
        $em = $this->getDoctrine()->getManager();
        $em->persist($informacion);
        $em->flush();
        
        
        //$file = $informacion->getMapapais();
        $file = $form['mapapais']->getData();

        if ($file != null)
        {
            // $fileName = md5(uniqid()).'.'.$file->guessExtension();
             $fileName = $file->getClientOriginalName();

             $file->move(
                 $this->getParameter('mapas_directory'),
                 $fileName
        );
             $mapa = new Mapas();
             $mapa->setNombremapa($fileName);
             $mapa->setUseradic($user);
             $mapa->setFechaadic(new \DateTime('now'));
             
             $em = $this->getDoctrine()->getManager();
             $em->persist($mapa);
             $em->flush();
             
             $mapaid = $mapa->getId();
             $informacion->setMapaid($mapaid);

             $es = $this->getDoctrine()->getManager();
             $es->persist($informacion);
             $es->flush();
             
        }
        
        
        $bandera = $form['banderapais']->getData();
        $informacionid = $informacion->getId();
        if ($bandera != null)
        {
            // $fileName = md5(uniqid()).'.'.$file->guessExtension();
             $fileNames = $bandera->getClientOriginalName();

             $bandera->move(
                 $this->getParameter('banderas_directory'),
                 $fileNames
        );
             $banderapais = new Banderas;
             $banderapais->setNombrebandera($fileNames);
             $banderapais->setUseradic($user);
             $banderapais->setFechaadic(new \DateTime('now'));
             $banderapais->setPaisid($informacionid);
             
             $em = $this->getDoctrine()->getManager();
             $em->persist($banderapais);
             $em->flush();
             
             //$mapaid = $mapa->getId();
             $informacion->setBanderaid($banderapais);

             $es = $this->getDoctrine()->getManager();
             $es->persist($informacion);
             $es->flush();
             
        }
        
        
        

        return $this->redirectToRoute('paises_listado_general');
    }
         return $this->render('AppBundle:Paises:agregar-nuevo-pais.html.twig', array('form'=> $form->createView()));
    
        
    }
    
    /**
     * @Route("/paises/ver-informacion/", name="paises_ver_informacion")
     */
    public function VerPaisAction(Request $request)
    {
         $id = $request->query->get('id');
         $paisRepository = $this->getDoctrine()
                                 ->getRepository('AppBundle:Infopais');
        $informacionPais    = $paisRepository->findOneBy(array('id'=>"$id"));
        
        $getmapaid = $informacionPais->getMapaid();
        
        $mapaRepository = $this->getDoctrine()
                               ->getRepository('AppBundle:Mapas');
        $mapaid = $mapaRepository->findOneBy(array('id'=>$getmapaid));
        
        
         return $this->render('AppBundle:Paises:ver-informacion-pais.html.twig', 
                 array('informacion'=> $informacionPais, 'mapa'=>$mapaid));
    }
    
    
    
    /**
     * @Route("/paises/editar-informacion/", name="paises_editar_informacion")
     */
    public function editarPaisAction(Request $request)
    {
         $id = $request->query->get('id');
         $paisRepository = $this->getDoctrine()
                                 ->getRepository('AppBundle:Infopais');
        $pais    = $paisRepository->findOneBy(array('id'=>"$id"));
        
        // $form = $this->createForm(AgregarPaisType::class, $pais);
         
         
         $form = $this->createFormBuilder($pais);
         $form  ->add('paisid', 
              EntityType::class, 

                        array(
                            'class' => \AppBundle\Entity\Paises::class,
                            'choice_label' => 'paisnombre',
                            'choice_value' => 'id',
                            'placeholder'=> 'Seleccione un pais',
                            "attr" => array
                            ('class' => 'select2 form-control col-md-7 col-xs-12', 'readonly'=>'readonly')
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
                    'required'   => false, 
                    "attr" => array('accept'=>'application/png'),
                    'data_class' => null))
                
                ->add('banderapais', FileType::class, array(
                    'label' => 'Bandera:', 
                    'mapped'=> false,
                    'required'   => false, 
                    "attr" => array('accept'=>'application/png'),
                    'data_class' => null))
                     
            ->add('guardar', SubmitType::class, 
                    array('label' => 'Registrar', 
                        "attr" => array('class' => 'btn btn-success')))
            
        ;
         $form =  $form->getForm();
        $form->handleRequest($request);
        
        $getbanderaid = $pais->getBanderaid();
        
        $banderaPaisRepository = $this->getDoctrine()
                               ->getRepository('AppBundle:Banderas');
        $banderaPais = $banderaPaisRepository->findOneBy(array('id'=>$getbanderaid));
         
        if ($form->isSubmitted() && $form->isValid()) {
         
        $informacion = $form->getData();
        $user = $this->getUser();
        $informacion->setUsermodi($user);
        $informacion->setFechamodi(new \DateTime('now'));
         
        $em = $this->getDoctrine()->getManager();
        $em->persist($informacion);
        $em->flush();
        
        $bandera = $form['banderapais']->getData();
         if ($bandera != null)
        {
            // $fileName = md5(uniqid()).'.'.$file->guessExtension();
             $banderaEditada = $bandera->getClientOriginalName();

             $bandera->move(
                 $this->getParameter('banderas_directory'),
                 $banderaEditada
        );
              
             $banderaPais->setNombrebandera($banderaEditada);
             $banderaPais->setUseradic($user);
             $banderaPais->setFechaadic(new \DateTime('now'));
              
             $em->persist($banderaPais);
             $em->flush();
        }
        
        
        
        
        $file = $form['mapapais']->getData();

        if ($file != null)
        {
            // $fileName = md5(uniqid()).'.'.$file->guessExtension();
             $nuevoMapa = $file->getClientOriginalName();

             $file->move(
                 $this->getParameter('mapas_directory'),
                 $nuevoMapa
        );
             $getmapaid = $pais->getMapaid();
             $mapaRepository = $this->getDoctrine()
                               ->getRepository('AppBundle:Mapas');
             $mapa = $mapaRepository->findOneBy(array('id'=>$getmapaid));
              
             $mapa->setNombremapa($nuevoMapa);
             $mapa->setUseradic($user);
             $mapa->setFechaadic(new \DateTime('now'));
             
              
             $em->persist($mapa);
             $em->flush();
             
             
             
        }
        
        return $this->redirectToRoute('paises_ver_informacion', array('id'=>$id));
        }
        
         return $this->render('AppBundle:Paises:pais-editar-informacion.html.twig', 
                 array('form'=> $form->createView()));
    }
    
    
    
    /**
     * @Route("/paises/listado-general/", name="paises_listado_general")
     */
    public function ListadoPaisesAction(Request $request)
    {
         
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT n 
                FROM AppBundle:Infopais n
                ORDER BY n.id ASC');
        $data['pais'] = $query->getResult();
        
         return $this->render('AppBundle:Paises:ver-listado-general.html.twig', array('data'=> $data));
    }
    
           
}

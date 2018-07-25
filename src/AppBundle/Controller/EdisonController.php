<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Edison;
use AppBundle\Entity\Pasaporte;
use AppBundle\Form\AgregarPasaporteType;
use AppBundle\Form\NuevoPaisEdisonType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;   
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;



class EdisonController extends Controller
{
    /**
     * @Route("/edison/agregar-pais/", name="edison_agregar_nuevo")
     */
    public function AgregarPaisAction(Request $request)
    {
        //Llamamos a la entidad para crear un nuevo consulado
        $edison = new Edison();
        
        //Llamamos al formulario para agregar un nuevo consulado y le pasamos la entidad
        //$form = $this->createForm(NuevoPaisEdisonType::class, $edison);
        
        $edisonListadoRepository = $this->getDoctrine()->getRepository('AppBundle:Edison');
        
        $edisonPaises = $edisonListadoRepository->createQueryBuilder("r")
        ->select('IDENTITY(r.paisid)')
        ->getQuery()
        ->getResult();
        
        $paisesRepository = $this->getDoctrine()->getRepository('AppBundle:Paises');

         $paises = $paisesRepository->createQueryBuilder("q")
                ->where("q.id NOT IN (:mispaises)")
                ->setParameter("mispaises", $edisonPaises)
                ->getQuery()
                ->getResult();
        
         $form = $this->createFormBuilder($edison);
         $form->add('paisid', 
              EntityType::class, 

                        array(
                            'class' => \AppBundle\Entity\Paises::class,
                            'choice_label' => 'paisnombre',
                            //'choice_value' => 'id',
                             'choices' => $paises,
                            'placeholder'=> 'Seleccione un pais',
                            "attr" => array
                            ('class' => 'select2 form-control col-md-7 col-xs-12')
                            ));

           
                
                $form->add('codigomapa', 
                    TextType::class, 
                    array(
                        "attr" => array
                        ('class' => 'form-control', 'placeholder'=>false)));
                
               
                
                $form->add('nombremapa', FileType::class, array(
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
        if ($form->isSubmitted() && $form->isValid()) {
        // $form->getData() holds the submitted values
        // but, the original `$task` variable has also been updated
        $pais = $form->getData();
        $user = $this->getUser();
        $pais->setUseradic($user);
        $pais->setFechaadic(new \DateTime('now'));
        
         //$file = $informacion->getMapapais();
        $file = $form['nombremapa']->getData();

        if ($file != null)
        {
            // $fileName = md5(uniqid()).'.'.$file->guessExtension();
             $fileName = $file->getClientOriginalName();

             $file->move(
                 $this->getParameter('mapas_edison_directory'),
                 $fileName
        );
             
        $pais->setNombremapa($fileName);
        // ... perform some action, such as saving the task to the database
        // for example, if Task is a Doctrine entity, save it!
        $em = $this->getDoctrine()->getManager();
        $em->persist($pais);
        $em->flush();
        
        
        
             
        }
        
       //$consuladoid = $informacion->getId();
        
        return $this->redirectToRoute('edison_listado_general');
    
    //    return $this->redirectToRoute('consulado_ver_informacion', array('id'=>$consuladoid));
    }
        
    
        return $this->render('AppBundle:Edison:agregar-nuevo-pais.html.twig', 
                array('form'=> $form->createView()));
    
        
    }
    
    
    /**
     * @Route("/edison/pais/agregar-documentos/", name="edison_pais_agregar_documentos")
     */
    public function AgregarDocumentosAction(Request $request)
    {
        $id = $request->query->get('id');
        //Llamamos a la entidad para crear un nuevo consulado
        $nuevo = new Pasaporte();
        
        //Llamamos al formulario para agregar un nuevo consulado y le pasamos la entidad
        $form = $this->createForm(AgregarPasaporteType::class, $nuevo);
        
        $form->handleRequest($request);
        // replace this example code with whatever you need
        if ($form->isSubmitted() && $form->isValid()) {
        // $form->getData() holds the submitted values
        // but, the original `$task` variable has also been updated
         
        $pasaporte = $form->getData();
        $images = array();
        $files = $nuevo->getNombrepasaporte();
        $key = 0;
      //  $files = $form['nombrepasaporte']->getData();
        if($files != null) 
            {
                foreach ($files as $file)
            {
               
                
                $fileName = md5(uniqid()) . '.' . $file->guessExtension();
                $file->move(
                    $this->getParameter('mapas_directory'),
                    $fileName
                );
                
           
                $images[$key++] = $fileName;
                $pasaporte->setNombrePasaporte($images);
            }
                $user = $this->getUser();
                $pasaporte->setUseradic($user);
                $pasaporte->setFechaadic(new \DateTime('now'));
                $pasaporte->setEdisonid($id);
                


                
                $em = $this->getDoctrine()->getManager();
                $em->persist($pasaporte);
                $em->flush();
                
                
                return $this->redirectToRoute('edison_ver_informacion', array('id'=>$id));

            }
        
       //$consuladoid = $consulado->getRedconsularid();
        

        //return $this->redirectToRoute('consulado_ver_informacion', array('id'=>$consuladoid));
    }
        
    
        return $this->render('AppBundle:Edison:agregar-nuevo-pasaporte.html.twig', 
                array('form'=> $form->createView(), 'redid'=> $id));
    
        
    }
    
    
    
    /**
     * @Route("/edison/pais/ver-informacion/", name="edison_ver_informacion")
     */
    public function VerConsuladoAction(Request $request)
    {
         $id = $request->query->get('id');
         $edisonRepository = $this->getDoctrine()
                                 ->getRepository('AppBundle:Edison');
        $pais = $edisonRepository->findOneBy(array('id'=>"$id"));
        
        //$em = $this->getDoctrine()->getManager();
        $pasaportesRepository = $this->getDoctrine()
                      ->getRepository('AppBundle:Pasaporte');
        
        $pasaportes = $pasaportesRepository->findBy(array('edisonid'=>$id));
        
        
        
        
         return $this->render('AppBundle:Edison:edison-pais-detalles.html.twig', 
                 array(
                     'informacion'=> $pais,
                     'documentos'=> $pasaportes,
                     ));
    }
    
    /**
     * @Route("/edison/listado-general/", name="edison_listado_general")
     */
    public function ListadoEdisonAction(Request $request)
    {
         
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT n 
                FROM AppBundle:Edison n
                ORDER BY n.id ASC');
        $data['edison'] = $query->getResult();
        
         return $this->render('AppBundle:Edison:edison-ver-listado-general.html.twig', array('data'=> $data));
    }
    
           
}

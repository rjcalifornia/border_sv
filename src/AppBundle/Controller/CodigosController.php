<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Codigos;
use AppBundle\Entity\Mapas;
use AppBundle\Entity\Banderas;
use AppBundle\Form\AgregarCodigoType;
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


class CodigosController extends Controller
{
    /**
     * @Route("/codigos/agregar-nuevo/", name="codigos_agregar_nuevo")
     */
    public function AgregarAction(Request $request)
    {
        $pais = new Codigos();
       // $form = $this->createForm(AgregarCodigoType::class, $pais);
        $codigosListadoRepository = $this->getDoctrine()->getRepository('AppBundle:Codigos');
        
        $codigosPaises = $codigosListadoRepository->createQueryBuilder("r")
        ->select('IDENTITY(r.paisid)')
        ->getQuery()
        ->getResult();
        
        $paisesRepository = $this->getDoctrine()->getRepository('AppBundle:Paises');
        if($codigosPaises != null)
        {
              $paises = $paisesRepository->createQueryBuilder("q")
                     ->where("q.id NOT IN (:mispaises)")
                     ->setParameter("mispaises", $codigosPaises)
                     ->getQuery()
                     ->getResult();
        }

        if($codigosPaises == null)
        {
            $paises = $paisesRepository->findAll();
        }
      
         
         $form = $this->createFormBuilder($pais);
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

                
                
                
                $form->add('iso', 
                    TextType::class, 
                    array(
                        "attr" => array
                        ('class' => 'form-control col-md-7 col-xs-12', 'placeholder'=>false)));
                
                
                
                $form->add('banderapais', FileType::class, array(
                    'label' => 'Bandera:', 
                    'mapped'=> false,
                    'required'   => true, 
                    "attr" => array('accept'=>'application/png'),
                    'data_class' => null));
                     
            $form->add('guardar', SubmitType::class, 
                    array('label' => 'Registrar', 
                        "attr" => array('class' => 'btn btn-success')));
        
        $form = $form->getForm();
            
        $form->handleRequest($request);
        // replace this example code with whatever you need
        if ($form->isSubmitted() && $form->isValid()) {
        // $form->getData() holds the submitted values
        // but, the original `$task` variable has also been updated
        $informacion = $form->getData();
        $user = $this->getUser();
        $informacion->setUseradic($user);
        $informacion->setFechaadic(new \DateTime('now'));
        
        $bandera = $form['banderapais']->getData();
        
        if ($bandera != null)
        {
            // $fileName = md5(uniqid()).'.'.$file->guessExtension();
             $fileNames = $bandera->getClientOriginalName();

             $bandera->move(
                 $this->getParameter('banderas_codigo_directory'),
                 $fileNames
        );
        
             $informacion->setBandera($fileNames);
        // ... perform some action, such as saving the task to the database
        // for example, if Task is a Doctrine entity, save it!
        $em = $this->getDoctrine()->getManager();
        $em->persist($informacion);
        $em->flush();
        
             
        }
        
        
        

        return $this->redirectToRoute('codigos_listado_general');
    }
         return $this->render('AppBundle:Codigos:agregar-nuevo-pais.html.twig', array('form'=> $form->createView()));
    
        
    }
    
    /**
     * @Route("/paises/ver-informacion/codigos/", name="codigos_paises_ver_informacion")
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
     * @Route("/codigos/listado-general/", name="codigos_listado_general")
     */
    public function ListadoCodigosAction(Request $request)
    {
         
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT n 
                FROM AppBundle:Codigos n
                ORDER BY n.id ASC');
        $data['pais'] = $query->getResult();
        
         return $this->render('AppBundle:Codigos:ver-listado-general.html.twig', array('data'=> $data));
    }
    
           
}

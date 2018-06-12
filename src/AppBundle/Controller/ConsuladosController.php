<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Redconsular;
use AppBundle\Entity\Consulados;
use AppBundle\Form\AgregarConsuladoType;
use AppBundle\Form\NuevoPaisConsuladoType;



class ConsuladosController extends Controller
{
    /**
     * @Route("/consulado/agregar-pais/", name="consulado_agregar_nuevo")
     */
    public function AgregarPaisAction(Request $request)
    {
        //Llamamos a la entidad para crear un nuevo consulado
        $consulado = new Redconsular();
        
        //Llamamos al formulario para agregar un nuevo consulado y le pasamos la entidad
        $form = $this->createForm(NuevoPaisConsuladoType::class, $consulado);
        
        $form->handleRequest($request);
        // replace this example code with whatever you need
        if ($form->isSubmitted() && $form->isValid()) {
        // $form->getData() holds the submitted values
        // but, the original `$task` variable has also been updated
        $informacion = $form->getData();
        $user = $this->getUser();
        $informacion->setUseradic($user);
        $informacion->setFechaadic(new \DateTime('now'));
        
         //$file = $informacion->getMapapais();
        $file = $form['nombremapa']->getData();

        if ($file != null)
        {
            // $fileName = md5(uniqid()).'.'.$file->guessExtension();
             $fileName = $file->getClientOriginalName();

             $file->move(
                 $this->getParameter('mapas_directory'),
                 $fileName
        );
             
        $informacion->setNombremapa($fileName);
        // ... perform some action, such as saving the task to the database
        // for example, if Task is a Doctrine entity, save it!
        $em = $this->getDoctrine()->getManager();
        $em->persist($informacion);
        $em->flush();
        
        
        
             
        }
        
       $consuladoid = $informacion->getId();
        

        return $this->redirectToRoute('consulado_ver_informacion', array('id'=>$consuladoid));
    }
        
    
        return $this->render('AppBundle:Consulados:agregar-pais.html.twig', 
                array('form'=> $form->createView()));
    
        
    }
    
    
    /**
     * @Route("/consulado/agregar-consulado/", name="consulado_agregar")
     */
    public function AgregarConsuladoAction(Request $request)
    {
        $id = $request->query->get('id');
        //Llamamos a la entidad para crear un nuevo consulado
        $nuevo = new Consulados();
        
        //Llamamos al formulario para agregar un nuevo consulado y le pasamos la entidad
        $form = $this->createForm(AgregarConsuladoType::class, $nuevo);
        
        $form->handleRequest($request);
        // replace this example code with whatever you need
        if ($form->isSubmitted() && $form->isValid()) {
        // $form->getData() holds the submitted values
        // but, the original `$task` variable has also been updated
        $consulado = $form->getData();
        $user = $this->getUser();
        $consulado->setUseradic($user);
        $consulado->setFechaadic(new \DateTime('now'));
        $consulado->setRedconsularid($id);
        $em = $this->getDoctrine()->getManager();
        $em->persist($consulado);
        $em->flush();
        
        
       $consuladoid = $consulado->getRedconsularid();
        

        return $this->redirectToRoute('consulado_ver_informacion', array('id'=>$consuladoid));
    }
        
    
        return $this->render('AppBundle:Consulados:agregar-nuevo-consulado.html.twig', 
                array('form'=> $form->createView(), 'redid'=> $id));
    
        
    }
    
    
    
    /**
     * @Route("/consulado/ver-informacion/", name="consulado_ver_informacion")
     */
    public function VerConsuladoAction(Request $request)
    {
         $id = $request->query->get('id');
         $redConsularRepository = $this->getDoctrine()
                                 ->getRepository('AppBundle:Redconsular');
        $redConsular = $redConsularRepository->findOneBy(array('id'=>"$id"));
        
        $em = $this->getDoctrine()->getManager();
        $consuladosRepository = $this->getDoctrine()
                      ->getRepository('AppBundle:Consulados');
        
        $consulados = $consuladosRepository->findBy(array('redconsularid'=>$id));
        
        
        
        
         return $this->render('AppBundle:Consulados:ver-informacion-pais.html.twig', 
                 array(
                     'redconsular'=> $redConsular,
                     'consulados'=> $consulados,
                     ));
    }
    
    /**
     * @Route("/consulado/listado-general/", name="consulado_listado_general")
     */
    public function ListadoConsuladoAction(Request $request)
    {
         
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT n 
                FROM AppBundle:Redconsular n
                ORDER BY n.id ASC');
        $data['consulado'] = $query->getResult();
        
         return $this->render('AppBundle:Consulados:ver-listado-general.html.twig', array('data'=> $data));
    }
    
           
}

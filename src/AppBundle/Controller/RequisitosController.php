<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Requisitosviaje;
use AppBundle\Form\AgregarRequisitoPaisType;


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
        $form = $this->createForm(AgregarRequisitoPaisType::class, $requisitoviaje);
        $form->handleRequest($request);
        // replace this example code with whatever you need
        if ($form->isSubmitted() && $form->isValid()) {
        // $form->getData() holds the submitted values
        // but, the original `$task` variable has also been updated
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
         return $this->render('AppBundle:Requisitos:agregar-nuevo-requisito-pais.html.twig', array('form'=> $form->createView()));
    
        
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

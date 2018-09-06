<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ReportesController extends Controller
{

    /**
     * @Route("/administracion/reportes/documentos-validos-de-viaje/", name="reporte_paises_documentos_validos")
     */
    public function reporteDocumentosValidosAction(Request $request)
    {
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
         
        $ingresados = $paisesRepository->createQueryBuilder("q")
                ->where("q.id IN (:mispaises)")
                ->setParameter("mispaises", $edisonPaises)
                ->getQuery()
                ->getResult();
         
        
         $data['paisesfaltantes'] = $paises;
         $data['paisesingresados'] = $ingresados;
         
        // replace this example code with whatever you need
         return $this->render('AppBundle:Reportes:reportes-documentos-validos-de-viaje.html.twig',
                 array(
                     'data'=>$data,
                 )
                 
                 );
    }
    
    
    /**
     * @Route("/administracion/reportes/requisitos-de-viaje", name="reporte_paises_requisitos_de_viaje")
     */
    public function reporteRequisitosViajesAction(Request $request)
    {
        
        
        
        
        $paisesRepository = $this->getDoctrine()->getRepository('AppBundle:Paises');

        
        $requisitosRepository = $this->getDoctrine()->getRepository('AppBundle:Requisitosviaje');
        
        $requisitosPaises = $requisitosRepository->createQueryBuilder("r")
        ->select('IDENTITY(r.paisid)')
        ->getQuery()
        ->getResult();
        
        $requisitosPaisesFaltantes = $paisesRepository->createQueryBuilder("q")
                ->where("q.id NOT IN (:mispaises)")
                ->setParameter("mispaises", $requisitosPaises)
                ->getQuery()
                ->getResult();
         
        $requisitosPaisesIngresados = $paisesRepository->createQueryBuilder("q")
                ->where("q.id IN (:mispaises)")
                ->setParameter("mispaises", $requisitosPaises)
                ->getQuery()
                ->getResult();
        
        
        
         $data['paisesfaltantes']= $requisitosPaisesFaltantes;
         $data['paisesingresados']= $requisitosPaisesIngresados;
         
        // replace this example code with whatever you need
         return $this->render('AppBundle:Reportes:reportes-requisitos-para-viajar.html.twig',
                 array(
                     'data'=>$data,
                 )
                 
                 );
    }
}

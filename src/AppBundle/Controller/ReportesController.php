<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ReportesController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
         return $this->render('AppBundle:Home:home.html.twig');
    }
    
    /**
     * @Route("/administracion/reportes/", name="reporte_paises")
     */
    public function reportePaisesEdisonAction(Request $request)
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
         
        
        $redconsularRepository = $this->getDoctrine()->getRepository('AppBundle:Redconsular');
        
        $consuladosPaises = $redconsularRepository->createQueryBuilder("r")
        ->select('IDENTITY(r.paisid)')
        ->getQuery()
        ->getResult();
        
        $consuladosPaisesFaltantes = $paisesRepository->createQueryBuilder("q")
                ->where("q.id NOT IN (:mispaises)")
                ->setParameter("mispaises", $consuladosPaises)
                ->getQuery()
                ->getResult();
         
        $consuladosPaisesIngresados = $paisesRepository->createQueryBuilder("q")
                ->where("q.id IN (:mispaises)")
                ->setParameter("mispaises", $consuladosPaises)
                ->getQuery()
                ->getResult();
        
        
        
         $data['paisesfaltantes'] = $paises;
         $data['paisesingresados'] = $ingresados;
         $data['paisconsuladofaltante']= $consuladosPaisesFaltantes;
         $data['paisconsuladoingresado']= $consuladosPaisesIngresados;
         
        // replace this example code with whatever you need
         return $this->render('AppBundle:Reportes:homepage.html.twig',
                 array(
                     'data'=>$data,
                 )
                 
                 );
    }
}

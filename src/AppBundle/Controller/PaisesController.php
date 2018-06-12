<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Infopais;
use AppBundle\Entity\Mapas;
use AppBundle\Entity\Banderas;
use AppBundle\Form\AgregarPaisType;

class PaisesController extends Controller
{
    /**
     * @Route("/paises/agregar-nuevo/", name="paises_agregar_nuevo")
     */
    public function AgregarAction(Request $request)
    {
        $pais = new Infopais();
        $form = $this->createForm(AgregarPaisType::class, $pais);
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

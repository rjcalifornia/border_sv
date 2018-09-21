<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use AppBundle\Entity\User;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use Symfony\Component\HttpFoundation\RedirectResponse;
use FOS\UserBundle\Event\FilterUserResponseEvent;

class UsuariosController extends Controller
{
    /**
     * @Route("/administracion/agregar-usuario-sistema/", name="crear_nuevo_usuario")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function NuevoAction(Request $request)
    {
        
         
    $user = new User;
    $form = $this->CreateForm('AppBundle\Form\UsuarioType', $user);
    $form->handleRequest($request);
    
     if ($form->isSubmitted() && $form->isValid()) {

            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $this->get('security.password_encoder')
                ->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);

            // 4) save the User!
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            
            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user

            return $this->redirectToRoute('usuarios_sistema_listado_general');
        }

        
        
        
          return $this->render('AppBundle:Usuarios:nuevo.html.twig', array(
           'form'=>$form->createView(),
        ));
    
         
      
    }
    
    
    
    /**
     * @Route("/administracion/listado-general-usuarios-sistema/", name="usuarios_sistema_listado_general")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function inicioAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager('default');
        $query = $em->createQuery('SELECT m 
                  FROM AppBundle:User m
                  ORDER BY m.id ASC');
      
        $data['usuarios'] = $query->getResult();
        
        
        
        // replace this example code with whatever you need
         return $this->render('AppBundle:Usuarios:listado-general-usuarios.html.twig', array(
                 'data'=>$data,
                 )
                 );
    
    }
    
    
    
    
      /**
     * @Route("/administracion/editar-usuario-sistema/", name="editar_usuario_sistema")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function EditarUsuarioAction(Request $request)
    {
        $usuarioid = $request->query->get('usuarioid');
         
        $em = $this->getDoctrine()->getManager('default');
        
        $userRepository = $em->getRepository('AppBundle:User');
        $user = $userRepository->findOneBy(array('id'=>"$usuarioid"));
        
         
        
    $form = $this->CreateForm('AppBundle\Form\UsuarioType', $user);
    $form->handleRequest($request);
    
     if ($form->isSubmitted() && $form->isValid()) {

         if($user->getPlainPassword() != null)
            {
            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $this->get('security.password_encoder')
                ->encodePassword($user, $user->getPlainPassword());
            
            $user->setPassword($password);
            }
            
            // 4) save the User!
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

             
            
            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user

            return $this->redirectToRoute('usuarios_sistema_listado_general');
        }

        
         
    
          return $this->render('AppBundle:Usuarios:editar.html.twig', array(
           'form'=>$form->createView(),
        ));
    
         
      
    }
    
    
 
}

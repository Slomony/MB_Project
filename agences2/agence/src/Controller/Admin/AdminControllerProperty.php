<?php


namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


use App\Entity\Property;
use App\Form\PropertyType;


class AdminControllerProperty extends AbstractController 
{
    /**
     * @Route("/admin", name="admin.index")
     */

    public function index ( )
    {
        $properties = $this->getDoctrine()->getRepository(Property::class)->findLatest();

        return $this->render('admin/property/index.html.twig',['properties'=>$properties]);
    }

    /**
     * @Route("/admin/edit/{id}", name="admin.property.edit",methods="GET|POST")
     */

    public function edit (Property $property,Request $request,ObjectManager $em)
    {


        $form = $this->createForm(PropertyType::class, $property);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em->flush();
            $this->addflash('succes','Bien modifié avec succès');
            return $this->redirectToRoute('admin.index');
        }

        return $this->render('admin/property/edit.html.twig',['property'=>$property,'formAdmin'=>$form->createView()]);

    }

    /**
     * @Route("/admin/create", name="admin.property.create",methods="GET|POST")
     */

    public function create (ObjectManager $em,Request $request)
    {

        $property =new property();
        $form = $this->createForm(PropertyType::class, $property);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em->persist($property);
            $em->flush();
            $this->addflash('succes','Bien crée avec succès');
            return $this->redirectToRoute('admin.index');
        }

        return $this->render('admin/property/create.html.twig',['property'=>$property,'formAdmin'=>$form->createView()]);

    }

    /**
     * @Route("/admin/delete/{id}", name="admin.property.delete", methods="DELETE")
     */ 

    public function delete (Property $property,Request $request,ObjectManager $em)
    {

        if($this->isCsrfTokenValid('delete'.$property->getId(),$request->get('_token')))
            {
            $em->remove($property);
            $em->flush();
            $this->addflash('succes','Bien supprimé avec succès');

            return $this->redirectToRoute('admin.index');

             }        

    }
    
    
}
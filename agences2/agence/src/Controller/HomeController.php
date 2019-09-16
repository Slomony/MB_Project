<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Component\Form\Extension\Core\Type\DateTime;
use Symfony\Component\HttpFoundation\Response;

use App\Entity\Property;



class HomeController extends AbstractController

{
      /**
     * @Route("/",name="home")
     */
    public function index()
    {
        
        //$entityManager = $this->getDoctrine()->getManager();
        //$properties=new Property();

        $properties = $this->getDoctrine()->getRepository(Property::class)->findLatest();
//dump($properties);
        
/*return new Response ('la valeur de title est '.$properties->getTitle().' et la valeur de description est 
 '.$properties->getDescription());*/
        return $this->render('home/index.html.twig', 
        [
        'properties'=>$properties,
        ]);
        }

        /**
     * @Route("/show/{id}",name="property.show")
     */
        public function show(Property $property)
        {
           

            return $this->render('home/show.html.twig',['property'=>$property]);
        }

    /**
     * @Route("/property/show/{slug}-{id}", name="property.show", 
     * requirements ={"slug":"[^a-zA-Z0-9\-]*"})
     */

     public function showSlug(Property $property, string $slug)
     {
        if($property->getSlug()!==$slug)
        {
            return $this->redirectToRoute('property.show',
            ['id'=>$property->getId(),'slug'=>$property.getSlug()]);
        }
        return $this->render('/property/show.html.twig',
        ['property'=> $property, 'current_menu'=>'property']);
    
     }

     

}
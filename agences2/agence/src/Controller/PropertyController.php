<?php

namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use App\Repository\PropertyRepository;
use App\Entity\Property;

class PropertyController extends AbstractController 
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
}
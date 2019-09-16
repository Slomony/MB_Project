<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType ;
use Symfony\Component\Form\FormBuilderInterface;
use App\Entity\Property;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PropertyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('title')
        ->add('surface')
        ->add('rooms')
        ->add('bedrooms')
        ->add('price')
        ->add('heat',ChoiceType::class,['choices'=>$this->getChoicesHeat()])
        ->add('floor')
        ->add('city',ChoiceType::class,['choices'=>$this->getChoicesCity()])
        ->add('address')
        ->add('postale_code')
        ->add('sold')
        ->add('description')
        ;


    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
           'data_class' => Property::class,
            'translation_domain'=>'forms'
        ]);
    }

    private function getChoicesCity()
    {
        $choices=Property::CITY;
        $output=[];
        foreach ($choices as $k => $v)
        {
            $output[$v]=$k;
        }
        return $output;
    }
    private function getChoicesHeat()
    {
        $choices=Property::HEAT;
        $output=[];
        foreach ($choices as $k => $v)
        {
            $output[$v]=$k;
        }
        return $output;
    }
}
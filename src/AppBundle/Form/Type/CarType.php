<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\Validator\Constraints as Assert;

class CarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', Type\TextType::class, ['label' => 'Name', 'required' => true])
            ->add('color', Type\TextareaType::class, ['label' => 'Description', 'attr' => ['placeholder' => '444444'], 'liform' => ['description' => '3 hexadecimal ditigs']])
        ;
    }
}

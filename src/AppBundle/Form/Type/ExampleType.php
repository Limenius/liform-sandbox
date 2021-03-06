<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\Validator\Constraints as Assert;

class ExampleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('text', Type\TextType::class, ['label' => 'Some text', 'attr' => ['pattern' => '.{5,}', 'required' => true], 'liform' => ['description' => 'This is a help message']])
            ->add('textarea', Type\TextareaType::class, ['label' => 'Description', 'attr' => ['placeholder' => 'A description...'], 'liform' => ['format' => 'textarea']])
            ->add('email', Type\EmailType::class, ['label' => 'E-mail', 'liform' => ['format' => 'email'], 'required' => 'true'])
            ->add('integer', Type\IntegerType::class, ['label' => 'An integer'])
            ->add('money', Type\MoneyType::class, ['label' => 'Money', 'liform' => ['format' => 'money']])
            ->add('number', Type\NumberType::class, ['label' => 'Number'])
            //->add('password', Type\PasswordType::class, ['label' => 'password'])
            //->add('percent', Type\PercentType::class, ['label' => 'percent'])
            //->add('search', Type\SearchType::class, ['label' => 'search'])
            //->add('url', Type\SearchType::class, ['label' => 'url'])
            //->add('choice', Type\ChoiceType::class, ['choices' => [1995 => 1995, 1996 => 1996], 'label' => 'choice'])
            //->add('country', Type\CountryType::class, ['label' => 'country'])
            //->add('language', Type\LanguageType::class, ['label' => 'language'])
            //->add('language', Type\LocaleType::class, ['label' => 'locale'])
            //->add('timezone', Type\TimezoneType::class, ['label' => 'timezone'])
            //->add('currency', Type\CurrencyType::class, ['label' => 'currency'])
            //->add('date', Type\DateType::class, ['label' => 'date'])
            //->add('datetime', Type\DateTimeType::class, ['label' => 'datetime'])
            //->add('time', Type\TimeType::class, ['label' => 'time'])
            //->add('birthday', Type\BirthdayType::class, ['label' => 'birthday'])
            //->add('checkbox', Type\CheckboxType::class, ['label' => 'checkbox'])
            ////->add('file', Type\FileType::class, ['label' => 'file'])
            //->add('radio', Type\RadioType::class, ['label' => 'radio'])
        ;
    }
}

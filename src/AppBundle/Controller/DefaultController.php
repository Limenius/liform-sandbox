<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Limenius\Liform\Liform;
use Limenius\Liform\Resolver;
use Limenius\Liform\Transformer\CompoundTransformer;
use Limenius\Liform\Transformer\IntegerTransformer;
use Limenius\Liform\Transformer\ChoiceTransformer;
use Limenius\Liform\Transformer\StringTransformer;
use Limenius\Liform\Transformer\NumberTransformer;
use Limenius\Liform\Transformer\BooleanTransformer;

use AppBundle\Form\Type\ExampleType;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $form = $this->createForm(ExampleType::class, null, array(
            'method' => 'GET',
        ));

        $resolver = new Resolver();
        $resolver->addTransformer('compound', new CompoundTransformer($resolver));
        $resolver->addTransformer('integer', new IntegerTransformer());
        $resolver->addTransformer('text', new StringTransformer());
        $resolver->addTransformer('textarea', new StringTransformer());
        $resolver->addTransformer('money', new NumberTransformer());
        $resolver->addTransformer('number', new NumberTransformer());
        $resolver->addTransformer('choice', new ChoiceTransformer());
        $resolver->addTransformer('percent', new NumberTransformer());
        $resolver->addTransformer('checkbox', new BooleanTransformer());
        $liform = new Liform($resolver);
        return $this->render('default/index.html.twig', [
            'form' => $form->createView(),
            'schema' => json_encode($liform->transform($form))
        ]);
    }
}

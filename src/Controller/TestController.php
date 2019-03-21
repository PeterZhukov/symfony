<?php
namespace App\Controller;

use App\Entity\Test;
use Sonata\BlockBundle\Form\Type\ContainerTemplateType;
use Sonata\BlockBundle\Form\Type\ServiceListType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/test/")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request)
    {
        // creates a task and gives it some dummy data for this example
        $test = new Test();

        $form = $this->createFormBuilder($test)
            ->add('servicesList', ServiceListType::class, [
                'context' => 'test',
            ])
            ->add('templates', ContainerTemplateType::class)
            ->add('save', SubmitType::class, ['label' => 'Create Task'])
            ->getForm();

        return $this->render('test/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
<?php

namespace App\Controller;

use App\Entity\Genus;
use App\Repository\GenusRepository;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController as BaseEasyAdminController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class AdminController extends BaseEasyAdminController
{

    /**
     * @Route("/test", name="admin_test")
     */
    public function testAction(){
        return $this->render('@EasyAdmin/page/content.html.twig');
    }
    /**
     * @Route("/dashboard", name="admin_dashboard")
     */
    public function dashboardAction()
    {
        $em = $this->getDoctrine()->getManager();
        /** @var GenusRepository $genusRepository */
        $genusRepository = $em->getRepository(Genus::class);

        return $this->render('easyadmin/dashboard.html.twig', [
            'genusCount' => $genusRepository->getGenusCount(),
            'publishedGenusCount' => $genusRepository->getPublishedGenusCount(),
            'randomGenus' => $genusRepository->findRandomGenus()
        ]);
    }
}

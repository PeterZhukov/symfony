<?php

namespace App\Controller\EasyAdmin;

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

    public function enableBatchAction(array $ids)
    {
        $class = $this->entity['class'];
        $em = $this->getDoctrine()->getManagerForClass($class);

        foreach ($ids as $id) {
            /** @var \App\Entity\Genus $genus */
            $genus = $em->find($class, $id);
            $genus->setIsPublished(true);
        }

        $this->em->flush();
    }

    public function disableBatchAction(array $ids)
    {
        $class = $this->entity['class'];
        $em = $this->getDoctrine()->getManagerForClass($class);

        foreach ($ids as $id) {
            /** @var \App\Entity\Genus $genus */
            $genus = $em->find($class, $id);
            $genus->setIsPublished(false);
        }

        $this->em->flush();
    }

    public function restockAction(){
        $id = $this->request->query->get('id');
        $this->addFlash('foo', $id.' has been restocked 2.');
        return $this->redirectToRoute('easyadmin', array(
           'action' => 'list',
           'entity' => $this->request->query->get('entity'),
        ));
    }

    public function approveBatchAction(array $ids){
        $this->addFlash('foo', $this->request->query->get('entity').' '.implode(', ', $ids). ' has been batch approved');
    }
}

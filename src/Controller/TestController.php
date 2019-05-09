<?php
namespace App\Controller;

use App\Entity\Genus;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends \Symfony\Bundle\FrameworkBundle\Controller\AbstractController {

    /**
     *
     * @Route("/enable", name="genus_enable")
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function enableAction(\Symfony\Component\HttpFoundation\Request $request){
        $em = $this->getDoctrine()->getManagerForClass(Genus::class);
        $entity = $em->find(Genus::class, $request->query->get('id'));
        $entity->setIsPublished(true);
        $em->persist($entity);
        $em->flush();
        return $this->redirectToRoute('easyadmin', array(
            'action' => 'list',
            'entity' => $request->query->get('entity'),
        ));
    }
}
<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class TestController extends AbstractController {

    /**
     * @Route("/test2", name="my_testtest")
     */
    public function testAction(Request $request){
        $id = $request->query->get('id');
        $this->addFlash('foo', $id.' has been my_testtest"ed');
        return $this->redirectToRoute('easyadmin', [
            'action' => 'list',
            'entity' => $request->query->get('entity'),
        ]);
    }
}
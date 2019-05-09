<?php
namespace App\Controller\EasyAdmin;

use App\Entity\User;
use App\Controller\EasyAdmin\AdminController;

class UserController extends AdminController {
    protected function updateUserEntity(User $entity, $editForm){
        $entity->setUpdatedAt(new \DateTime());
        return parent::updateEntity($entity);
    }
}
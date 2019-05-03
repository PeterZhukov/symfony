<?php
namespace App\Controller\EasyAdmin;

use App\Entity\User;

class UserController extends AdminController {
    protected function updateUserEntity(User $entity, $editForm){
        $entity->setUpdatedAt(new \DateTime());
        return parent::updateEntity($entity);
    }
}
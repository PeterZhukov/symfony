<?php
namespace App\Controller\EasyAdmin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController as BaseEasyAdminController;

class UserController extends BaseEasyAdminController {
    protected function updateUserEntity(User $entity, $editForm){
        $entity->setUpdatedAt(new \DateTime());
        return parent::updateEntity($entity);
    }
}
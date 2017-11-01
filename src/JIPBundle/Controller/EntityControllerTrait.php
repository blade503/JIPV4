<?php

namespace JIPBundle\Controller;

use Doctrine\ORM\EntityManager;

trait EntityControllerTrait
{
    public function getEntityManager()
    {
        return $this->getDoctrine()->getManager();
    }

    public function insert($entity)
    {
        $this->getEntityManager()->persist($entity);
    }

    public function update()
    {
        $this->getEntityManager()->flush();
    }

    public function remove($entity)
    {
        $this->getEntityManager()->remove($entity);
        $this->getEntityManager()->flush();
    }

}
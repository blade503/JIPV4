<?php

namespace JIPBundle\Manager;

use Doctrine\ORM\EntityManager;
use JIPBundle\Entity\Annonce;


class AnnonceManager extends BaseManager
{
    protected $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function findAnnonceById($annonceId) {
        return $this->getRepository()
            ->findOneBy(array('id' => $annonceId));
    }


    public function getAllAnnonces() {
        return $this->getRepository()
            ->getAllAnnonces()
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * Save Annonce entity
     *
     * @param Annonce $annonce
     */
    public function saveAnnonce(Annonce $annonce)
    {
        $this->persistAndFlush($annonce);
    }

    public function setCreationDateValue(Annonce $annonce)
    {
        $annonce->setCreatedAt(new \DateTime('now'));
        $annonce->setUpdatedAt(new \DateTime('now'));
    }

    /**
     * Save Annonce entity
     *
     * @param Annonce $annonce
     */
    public function deleteAnnonce(Annonce $annonce)
    {
        $this->removeAndFlush($annonce);
    }

    public function getRepository()
    {
        return $this->em->getRepository('JIPBundle:Annonce');
    }

}
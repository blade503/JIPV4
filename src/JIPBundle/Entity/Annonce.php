<?php

namespace JIPBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="annonce")
 */
class Annonce
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name ="titre", type="string")
     */
    private $title;

    /**
     * @ORM\Column(name="description", type="string", nullable = true, length=2000)
     */
    private $description;

    /**
     * @ORM\Column(name="lien", type="string", nullable = false, length=500)
     */
    private $lien;

    /**
     * @ORM\Column(type="string", nullable = true)
     *
     * @Assert\NotBlank(message="Les Fichiers doivent etre des images")
     * @Assert\File(mimeTypes={ "image/png", "image/jpg", "image/jpeg", "application/octet-stream" })
     */

    private $image;

}

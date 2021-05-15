<?php

namespace BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Inscrire
 *
 * @ORM\Table(name="inscrire")
 * @ORM\Entity(repositoryClass="BackBundle\Repository\InscrireRepository")
 */
class Inscrire
{
    /**
     * @ORM\ManyToOne(targetEntity="BackBundle\Entity\Formation",inversedBy="inscrire",cascade={"persist"})
    */
    private $formation;

    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\Eleve",inversedBy="inscrire",cascade={"persist"})
    */
    private $eleve;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateinscription", type="date")
     */
    private $dateinscription;

    public function __construct()
    {
        $this->dateinscription = new \Datetime();
    }
    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set dateinscription
     *
     * @param \DateTime $dateinscription
     *
     * @return Inscrire
     */
    public function setDateinscription($dateinscription)
    {
        $this->dateinscription = $dateinscription;

        return $this;
    }

    /**
     * Get dateinscription
     *
     * @return \DateTime
     */
    public function getDateinscription()
    {
        return $this->dateinscription;
    }

    /**
     * Set formation
     *
     * @param \BackBundle\Entity\Formation $formation
     *
     * @return Inscrire
     */
    public function setFormation(\BackBundle\Entity\Formation $formation = null)
    {
        $this->formation = $formation;

        return $this;
    }

    /**
     * Get formation
     *
     * @return \BackBundle\Entity\Formation
     */
    public function getFormation()
    {
        return $this->formation;
    }

    /**
     * Set eleve
     *
     * @param \UserBundle\Entity\Eleve $eleve
     *
     * @return Inscrire
     */
    public function setEleve(\UserBundle\Entity\Eleve $eleve = null)
    {
        $this->eleve = $eleve;

        return $this;
    }

    /**
     * Get eleve
     *
     * @return \UserBundle\Entity\Eleve
     */
    public function getEleve()
    {
        return $this->eleve;
    }
}

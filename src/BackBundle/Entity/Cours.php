<?php

namespace BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cours
 *
 * @ORM\Table(name="cours")
 * @ORM\Entity(repositoryClass="BackBundle\Repository\CoursRepository")
 */
class Cours
{
    /**
     * @ORM\ManyToOne(targetEntity="BackBundle\Entity\Formation",inversedBy="cours",cascade={"persist"})
    */
    private $formation;

    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\Professeur",inversedBy="cours",cascade={"persist"})
    */
    private $professeur;
    
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="libellecours", type="string", length=100)
     */
    private $libellecours;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptioncours", type="string", length=255)
     */
    private $descriptioncours;

    /**
     * @var int
     *
     * @ORM\Column(name="dureecours", type="integer")
     */
    private $dureecours;

    /**
     * @var string
     *
     * @ORM\Column(name="datecours", type="string", length=255)
     */
    private $datecours;

    /**
     * @var string
     *
     * @ORM\Column(name="lien", type="string", length=255)
     */
    private $lien;


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
     * Set libellecours
     *
     * @param string $libellecours
     *
     * @return Cours
     */
    public function setLibellecours($libellecours)
    {
        $this->libellecours = $libellecours;

        return $this;
    }

    /**
     * Get libellecours
     *
     * @return string
     */
    public function getLibellecours()
    {
        return $this->libellecours;
    }

    /**
     * Set descriptioncours
     *
     * @param string $descriptioncours
     *
     * @return Cours
     */
    public function setDescriptioncours($descriptioncours)
    {
        $this->descriptioncours = $descriptioncours;

        return $this;
    }

    /**
     * Get descriptioncours
     *
     * @return string
     */
    public function getDescriptioncours()
    {
        return $this->descriptioncours;
    }

    /**
     * Set dureecours
     *
     * @param integer $dureecours
     *
     * @return Cours
     */
    public function setDureecours($dureecours)
    {
        $this->dureecours = $dureecours;

        return $this;
    }

    /**
     * Get dureecours
     *
     * @return integer
     */
    public function getDureecours()
    {
        return $this->dureecours;
    }

    /**
     * Set datecours
     *
     * @param string $datecours
     *
     * @return Cours
     */
    public function setDatecours($datecours)
    {
        $this->datecours = $datecours;

        return $this;
    }

    /**
     * Get datecours
     *
     * @return string
     */
    public function getDatecours()
    {
        return $this->datecours;
    }

    /**
     * Set lien
     *
     * @param string $lien
     *
     * @return Cours
     */
    public function setLien($lien)
    {
        $this->lien = $lien;

        return $this;
    }

    /**
     * Get lien
     *
     * @return string
     */
    public function getLien()
    {
        return $this->lien;
    }

    /**
     * Set formation
     *
     * @param \BackBundle\Entity\Formation $formation
     *
     * @return Cours
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
     * Set professeur
     *
     * @param \UserBundle\Entity\Professeur $professeur
     *
     * @return Cours
     */
    public function setProfesseur(\UserBundle\Entity\Professeur $professeur = null)
    {
        $this->professeur = $professeur;

        return $this;
    }

    /**
     * Get professeur
     *
     * @return \UserBundle\Entity\Professeur
     */
    public function getProfesseur()
    {
        return $this->professeur;
    }
}

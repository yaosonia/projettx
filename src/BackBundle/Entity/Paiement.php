<?php

namespace BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Paiement
 *
 * @ORM\Table(name="paiement")
 * @ORM\Entity(repositoryClass="BackBundle\Repository\PaiementRepository")
 */
class Paiement
{
     /**
     * @ORM\ManyToOne(targetEntity="BackBundle\Entity\Formation",inversedBy="paiement",cascade={"persist"})
    */
    private $formation;

     /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\Parents",inversedBy="paiement",cascade={"persist"})
    */
    private $parents;

    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\Eleve",inversedBy="paiement",cascade={"persist"})
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
     * @ORM\Column(name="datepaiement", type="date")
     */
    private $datepaiement;

    /**
     * @var string
     *
     * @ORM\Column(name="libellepaiement", type="string", length=255)
     */
    private $libellepaiement;

    /**
     * @var float
     *
     * @ORM\Column(name="montantpaiement", type="float")
     */
    private $montantpaiement;

    /**
     * @var int
     *
     * @ORM\Column(name="reduction", type="integer", nullable=true)
     */
    private $reduction;

    /**
     * @var float
     *
     * @ORM\Column(name="montantfinal", type="float")
     */
    private $montantfinal;



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
     * Set datepaiement
     *
     * @param \DateTime $datepaiement
     *
     * @return Paiement
     */
    public function setDatepaiement($datepaiement)
    {
        $this->datepaiement = $datepaiement;

        return $this;
    }

    /**
     * Get datepaiement
     *
     * @return \DateTime
     */
    public function getDatepaiement()
    {
        return $this->datepaiement;
    }

    /**
     * Set libellepaiement
     *
     * @param string $libellepaiement
     *
     * @return Paiement
     */
    public function setLibellepaiement($libellepaiement)
    {
        $this->libellepaiement = $libellepaiement;

        return $this;
    }

    /**
     * Get libellepaiement
     *
     * @return string
     */
    public function getLibellepaiement()
    {
        return $this->libellepaiement;
    }

    /**
     * Set montantpaiement
     *
     * @param float $montantpaiement
     *
     * @return Paiement
     */
    public function setMontantpaiement($montantpaiement)
    {
        $this->montantpaiement = $montantpaiement;

        return $this;
    }

    /**
     * Get montantpaiement
     *
     * @return float
     */
    public function getMontantpaiement()
    {
        return $this->montantpaiement;
    }

    /**
     * Set reduction
     *
     * @param integer $reduction
     *
     * @return Paiement
     */
    public function setReduction($reduction)
    {
        $this->reduction = $reduction;

        return $this;
    }

    /**
     * Get reduction
     *
     * @return integer
     */
    public function getReduction()
    {
        return $this->reduction;
    }

    /**
     * Set montantfinal
     *
     * @param float $montantfinal
     *
     * @return Paiement
     */
    public function setMontantfinal($montantfinal)
    {
        $this->montantfinal = $montantfinal;

        return $this;
    }

    /**
     * Get montantfinal
     *
     * @return float
     */
    public function getMontantfinal()
    {
        return $this->montantfinal;
    }

    /**
     * Set formation
     *
     * @param \BackBundle\Entity\Formation $formation
     *
     * @return Paiement
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
     * Set parents
     *
     * @param \UserBundle\Entity\Parents $parents
     *
     * @return Paiement
     */
    public function setParents(\UserBundle\Entity\Parents $parents = null)
    {
        $this->parents = $parents;

        return $this;
    }

    /**
     * Get parents
     *
     * @return \UserBundle\Entity\Parents
     */
    public function getParents()
    {
        return $this->parents;
    }

    /**
     * Set eleve
     *
     * @param \UserBundle\Entity\Eleve $eleve
     *
     * @return Paiement
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

<?php

namespace BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Formation
 *
 * @ORM\Table(name="formation")
 * @ORM\Entity(repositoryClass="BackBundle\Repository\FormationRepository")
 */
class Formation
{
    /**
     * @ORM\OneToMany(targetEntity="BackBundle\Entity\Cours",mappedBy="formation",cascade={"persist"})
    */
    private $cours;

    /**
     * @ORM\OneToMany(targetEntity="BackBundle\Entity\Inscrire",mappedBy="formation",cascade={"persist"})
    */
    private $inscrire;

    /**
     * @ORM\OneToMany(targetEntity="BackBundle\Entity\Paiement",mappedBy="formation",cascade={"persist"})
    */
    private $paiement;


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
     * @ORM\Column(name="libelleformation", type="string", length=128)
     */
    private $libelleformation;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptionformation", type="string", length=255, nullable=true)
     */
    private $descriptionformation;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float")
     */
    private $prix;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cours = new \Doctrine\Common\Collections\ArrayCollection();
        $this->inscrire = new \Doctrine\Common\Collections\ArrayCollection();
        $this->paiement = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set libelleformation
     *
     * @param string $libelleformation
     *
     * @return Formation
     */
    public function setLibelleformation($libelleformation)
    {
        $this->libelleformation = $libelleformation;

        return $this;
    }

    /**
     * Get libelleformation
     *
     * @return string
     */
    public function getLibelleformation()
    {
        return $this->libelleformation;
    }

    /**
     * Set descriptionformation
     *
     * @param string $descriptionformation
     *
     * @return Formation
     */
    public function setDescriptionformation($descriptionformation)
    {
        $this->descriptionformation = $descriptionformation;

        return $this;
    }

    /**
     * Get descriptionformation
     *
     * @return string
     */
    public function getDescriptionformation()
    {
        return $this->descriptionformation;
    }

    /**
     * Set prix
     *
     * @param float $prix
     *
     * @return Formation
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return float
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Add cour
     *
     * @param \BackBundle\Entity\Cours $cour
     *
     * @return Formation
     */
    public function addCour(\BackBundle\Entity\Cours $cour)
    {
        $this->cours[] = $cour;

        return $this;
    }

    /**
     * Remove cour
     *
     * @param \BackBundle\Entity\Cours $cour
     */
    public function removeCour(\BackBundle\Entity\Cours $cour)
    {
        $this->cours->removeElement($cour);
    }

    /**
     * Get cours
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCours()
    {
        return $this->cours;
    }

    /**
     * Add inscrire
     *
     * @param \BackBundle\Entity\Inscrire $inscrire
     *
     * @return Formation
     */
    public function addInscrire(\BackBundle\Entity\Inscrire $inscrire)
    {
        $this->inscrire[] = $inscrire;

        return $this;
    }

    /**
     * Remove inscrire
     *
     * @param \BackBundle\Entity\Inscrire $inscrire
     */
    public function removeInscrire(\BackBundle\Entity\Inscrire $inscrire)
    {
        $this->inscrire->removeElement($inscrire);
    }

    /**
     * Get inscrire
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getInscrire()
    {
        return $this->inscrire;
    }

    /**
     * Add paiement
     *
     * @param \BackBundle\Entity\Paiement $paiement
     *
     * @return Formation
     */
    public function addPaiement(\BackBundle\Entity\Paiement $paiement)
    {
        $this->paiement[] = $paiement;

        return $this;
    }

    /**
     * Remove paiement
     *
     * @param \BackBundle\Entity\Paiement $paiement
     */
    public function removePaiement(\BackBundle\Entity\Paiement $paiement)
    {
        $this->paiement->removeElement($paiement);
    }

    /**
     * Get paiement
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPaiement()
    {
        return $this->paiement;
    }
}

<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Eleve
 *
 * @ORM\Table(name="eleve")
 * @ORM\Entity(repositoryClass="UserBundle\Repository\EleveRepository")
 */
class Eleve
{
      /**
     * @ORM\OneToMany(targetEntity="BackBundle\Entity\Paiement",mappedBy="eleve",cascade={"persist"})
    */
    private $paiement;

     /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\Parents",inversedBy="eleve",cascade={"persist"})
    */
    private $parents;

    
      /**
     * @ORM\OneToMany(targetEntity="BackBundle\Entity\Inscrire",mappedBy="eleve",cascade={"persist"})
    */
    private $inscrire;


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
     * @ORM\Column(name="sexe", type="string", length=12)
     */
    private $sexe;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=50)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=100)
     */
    private $prenom;
    
    /**
     * @var string
     *
     * @ORM\Column(name="datenais", type="string")
     */
    private $datenais;

   
     /**
     * @var int
     *
     * @ORM\Column(name="numeroeleve", type="integer")
     */
    private $numeroeleve;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->paiement = new \Doctrine\Common\Collections\ArrayCollection();
        $this->inscrire = new \Doctrine\Common\Collections\ArrayCollection();
        $this->numeroeleve = 1;
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
     * Set sexe
     *
     * @param string $sexe
     *
     * @return Eleve
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get sexe
     *
     * @return string
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Eleve
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Eleve
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set numeroeleve
     *
     * @param integer $numeroeleve
     *
     * @return Eleve
     */
    public function setNumeroeleve($numeroeleve)
    {
        $this->numeroeleve = $numeroeleve;

        return $this;
    }

    /**
     * Get numeroeleve
     *
     * @return integer
     */
    public function getNumeroeleve()
    {
        return $this->numeroeleve;
    }

    /**
     * Add paiement
     *
     * @param \BackBundle\Entity\Paiement $paiement
     *
     * @return Eleve
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

    /**
     * Set parents
     *
     * @param \UserBundle\Entity\Parents $parents
     *
     * @return Eleve
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
     * Add inscrire
     *
     * @param \BackBundle\Entity\Inscrire $inscrire
     *
     * @return Eleve
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
     * Set datenais
     *
     * @param string $datenais
     *
     * @return Eleve
     */
    public function setDatenais($datenais)
    {
        $this->datenais = $datenais;

        return $this;
    }

    /**
     * Get datenais
     *
     * @return string
     */
    public function getDatenais()
    {
        return $this->datenais;
    }
}

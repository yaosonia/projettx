<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Parents
 *
 * @ORM\Table(name="parents")
 * @ORM\Entity(repositoryClass="UserBundle\Repository\ParentsRepository")
 */
class Parents
{
      /**
     * @ORM\OneToMany(targetEntity="BackBundle\Entity\Paiement",mappedBy="parents",cascade={"persist"})
    */
    private $paiement;

     /**
     * @ORM\OneToMany(targetEntity="UserBundle\Entity\Eleve",mappedBy="parents",cascade={"persist"})
    */
    private $eleve;

      /**
     * @ORM\OneToMany(targetEntity="BackBundle\Entity\Communiquer",mappedBy="parents",cascade={"persist"})
    */
    private $communiquer;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="civilite", type="string", length=12)
     */
    private $civilite;

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
     * @var int
     *
     * @ORM\Column(name="numerovoie", type="integer")
     */
    private $numerovoie;

    /**
     * @var string
     *
     * @ORM\Column(name="nomvoie", type="string", length=150)
     */
    private $nomvoie;

    /**
     * @var int
     *
     * @ORM\Column(name="codepostal", type="integer")
     */
    private $codepostal;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=50)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=100)
     */
    private $pays;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=100)
     */
    private $telephone;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->paiement = new \Doctrine\Common\Collections\ArrayCollection();
        $this->eleve = new \Doctrine\Common\Collections\ArrayCollection();
        $this->communiquer = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set civilite
     *
     * @param string $civilite
     *
     * @return Parents
     */
    public function setCivilite($civilite)
    {
        $this->civilite = $civilite;

        return $this;
    }

    /**
     * Get civilite
     *
     * @return string
     */
    public function getCivilite()
    {
        return $this->civilite;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Parents
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
     * @return Parents
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
     * Set numerovoie
     *
     * @param integer $numerovoie
     *
     * @return Parents
     */
    public function setNumerovoie($numerovoie)
    {
        $this->numerovoie = $numerovoie;

        return $this;
    }

    /**
     * Get numerovoie
     *
     * @return integer
     */
    public function getNumerovoie()
    {
        return $this->numerovoie;
    }

    /**
     * Set nomvoie
     *
     * @param string $nomvoie
     *
     * @return Parents
     */
    public function setNomvoie($nomvoie)
    {
        $this->nomvoie = $nomvoie;

        return $this;
    }

    /**
     * Get nomvoie
     *
     * @return string
     */
    public function getNomvoie()
    {
        return $this->nomvoie;
    }

    /**
     * Set codepostal
     *
     * @param integer $codepostal
     *
     * @return Parents
     */
    public function setCodepostal($codepostal)
    {
        $this->codepostal = $codepostal;

        return $this;
    }

    /**
     * Get codepostal
     *
     * @return integer
     */
    public function getCodepostal()
    {
        return $this->codepostal;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Parents
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set pays
     *
     * @param string $pays
     *
     * @return Parents
     */
    public function setPays($pays)
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * Get pays
     *
     * @return string
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Parents
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     *
     * @return Parents
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Add paiement
     *
     * @param \BackBundle\Entity\Paiement $paiement
     *
     * @return Parents
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
     * Add eleve
     *
     * @param \UserBundle\Entity\Eleve $eleve
     *
     * @return Parents
     */
    public function addEleve(\UserBundle\Entity\Eleve $eleve)
    {
        $this->eleve[] = $eleve;

        return $this;
    }

    /**
     * Remove eleve
     *
     * @param \UserBundle\Entity\Eleve $eleve
     */
    public function removeEleve(\UserBundle\Entity\Eleve $eleve)
    {
        $this->eleve->removeElement($eleve);
    }

    /**
     * Get eleve
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEleve()
    {
        return $this->eleve;
    }

    /**
     * Add communiquer
     *
     * @param \BackBundle\Entity\Communiquer $communiquer
     *
     * @return Parents
     */
    public function addCommuniquer(\BackBundle\Entity\Communiquer $communiquer)
    {
        $this->communiquer[] = $communiquer;

        return $this;
    }

    /**
     * Remove communiquer
     *
     * @param \BackBundle\Entity\Communiquer $communiquer
     */
    public function removeCommuniquer(\BackBundle\Entity\Communiquer $communiquer)
    {
        $this->communiquer->removeElement($communiquer);
    }

    /**
     * Get communiquer
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommuniquer()
    {
        return $this->communiquer;
    }
}

<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

        /**
         * @ORM\Entity
         * @ORM\Table(name="professeur")
         *  * @ORM\Entity(repositoryClass="UserBundle\Repository\ProfesseurRepository")
         */
class Professeur
{

         /**
     * @ORM\OneToMany(targetEntity="BackBundle\Entity\Cours",mappedBy="professeur",cascade={"persist"})
    */
    private $cours;

     /**
     * @ORM\OneToMany(targetEntity="BackBundle\Entity\Publication",mappedBy="professeur",cascade={"persist"})
    */
    private $publication;

    /**
     * @ORM\OneToMany(targetEntity="BackBundle\Entity\Inscrire",mappedBy="professeur",cascade={"persist"})
    */
    private $inscrire;

      /**
     * @ORM\OneToMany(targetEntity="BackBundle\Entity\Paiement",mappedBy="professeur",cascade={"persist"})
    */
    private $paiement;

     /**
     * @ORM\OneToMany(targetEntity="BackBundle\Entity\Communiquer",mappedBy="professeur",cascade={"persist"})
    */
    private $communiquer;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
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
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100)
     */
    private $email;


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



    public function __construct()
    {
        #parent::__construct();
 
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
     * @return Professeur
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
     * @return Professeur
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
     * @return Professeur
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
     * Set email
     *
     * @param string $email
     *
     * @return Professeur
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
     * Set numerovoie
     *
     * @param integer $numerovoie
     *
     * @return Professeur
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
     * @return Professeur
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
     * @return Professeur
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
     * @return Professeur
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
     * @return Professeur
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
     * Add cour
     *
     * @param \BackBundle\Entity\Cours $cour
     *
     * @return Professeur
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
     * Add publication
     *
     * @param \BackBundle\Entity\Publication $publication
     *
     * @return Professeur
     */
    public function addPublication(\BackBundle\Entity\Publication $publication)
    {
        $this->publication[] = $publication;

        return $this;
    }

    /**
     * Remove publication
     *
     * @param \BackBundle\Entity\Publication $publication
     */
    public function removePublication(\BackBundle\Entity\Publication $publication)
    {
        $this->publication->removeElement($publication);
    }

    /**
     * Get publication
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPublication()
    {
        return $this->publication;
    }

    /**
     * Add inscrire
     *
     * @param \BackBundle\Entity\Inscrire $inscrire
     *
     * @return Professeur
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
     * @return Professeur
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
     * Add communiquer
     *
     * @param \BackBundle\Entity\Communiquer $communiquer
     *
     * @return Professeur
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

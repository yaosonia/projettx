<?php

namespace BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Communiquer
 *
 * @ORM\Table(name="communiquer")
 * @ORM\Entity(repositoryClass="BackBundle\Repository\CommuniquerRepository")
 */
class Communiquer
{
     /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\Parents",inversedBy="communiquer",cascade={"persist"})
    */
    private $parents;

     /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\Professeur",inversedBy="communiquer",cascade={"persist"})
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
     * @ORM\Column(name="objet", type="string", length=500)
     */
    private $objet;

    /**
     * @var string
     *
     * @ORM\Column(name="contenumessage", type="string", length=500)
     */
    private $contenumessage;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datemessage", type="date")
     */
    private $datemessage;

    /**
     *  @var boolean
     * @ORM\Column(name="isparentsend", type="boolean", nullable=true, options={"default":false})
     */
    private $isparentsend;

    /**
     *  @var boolean
     * @ORM\Column(name="isprofesseursend", type="boolean", nullable=true, options={"default":false})
     */
    private $isprofesseursend;

    public function __construct()
    {
        $this->datemessage = new \Datetime();
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
     * Set objet
     *
     * @param string $objet
     *
     * @return Communiquer
     */
    public function setObjet($objet)
    {
        $this->objet = $objet;

        return $this;
    }

    /**
     * Get objet
     *
     * @return string
     */
    public function getObjet()
    {
        return $this->objet;
    }

    /**
     * Set contenumessage
     *
     * @param string $contenumessage
     *
     * @return Communiquer
     */
    public function setContenumessage($contenumessage)
    {
        $this->contenumessage = $contenumessage;

        return $this;
    }

    /**
     * Get contenumessage
     *
     * @return string
     */
    public function getContenumessage()
    {
        return $this->contenumessage;
    }

    /**
     * Set datemessage
     *
     * @param \DateTime $datemessage
     *
     * @return Communiquer
     */
    public function setDatemessage($datemessage)
    {
        $this->datemessage = $datemessage;

        return $this;
    }

    /**
     * Get datemessage
     *
     * @return \DateTime
     */
    public function getDatemessage()
    {
        return $this->datemessage;
    }

    /**
     * Set isparentsend
     *
     * @param boolean $isparentsend
     *
     * @return Communiquer
     */
    public function setIsparentsend($isparentsend)
    {
        $this->isparentsend = $isparentsend;

        return $this;
    }

    /**
     * Get isparentsend
     *
     * @return boolean
     */
    public function getIsparentsend()
    {
        return $this->isparentsend;
    }

    /**
     * Set isprofesseursend
     *
     * @param boolean $isprofesseursend
     *
     * @return Communiquer
     */
    public function setIsprofesseursend($isprofesseursend)
    {
        $this->isprofesseursend = $isprofesseursend;

        return $this;
    }

    /**
     * Get isprofesseursend
     *
     * @return boolean
     */
    public function getIsprofesseursend()
    {
        return $this->isprofesseursend;
    }

    /**
     * Set parents
     *
     * @param \UserBundle\Entity\Parents $parents
     *
     * @return Communiquer
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
     * Set professeur
     *
     * @param \UserBundle\Entity\Professeur $professeur
     *
     * @return Communiquer
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

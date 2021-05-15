<?php

namespace BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Publication
 *
 * @ORM\Table(name="publication")
 * @ORM\Entity(repositoryClass="BackBundle\Repository\PublicationRepository")
 */
class Publication
{
    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\Professeur",inversedBy="publication",cascade={"persist"})
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
     * @ORM\Column(name="libellepublication", type="string", length=255)
     */
    private $libellepublication;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptionpublication", type="string", length=255)
     */
    private $descriptionpublication;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datepublication", type="date")
     */
    private $datepublication;



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
     * Set libellepublication
     *
     * @param string $libellepublication
     *
     * @return Publication
     */
    public function setLibellepublication($libellepublication)
    {
        $this->libellepublication = $libellepublication;

        return $this;
    }

    /**
     * Get libellepublication
     *
     * @return string
     */
    public function getLibellepublication()
    {
        return $this->libellepublication;
    }

    /**
     * Set descriptionpublication
     *
     * @param string $descriptionpublication
     *
     * @return Publication
     */
    public function setDescriptionpublication($descriptionpublication)
    {
        $this->descriptionpublication = $descriptionpublication;

        return $this;
    }

    /**
     * Get descriptionpublication
     *
     * @return string
     */
    public function getDescriptionpublication()
    {
        return $this->descriptionpublication;
    }

    /**
     * Set datepublication
     *
     * @param \DateTime $datepublication
     *
     * @return Publication
     */
    public function setDatepublication($datepublication)
    {
        $this->datepublication = $datepublication;

        return $this;
    }

    /**
     * Get datepublication
     *
     * @return \DateTime
     */
    public function getDatepublication()
    {
        return $this->datepublication;
    }

    /**
     * Set professeur
     *
     * @param \UserBundle\Entity\Professeur $professeur
     *
     * @return Publication
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

<?php

namespace sil21\VitrineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 */
class Commande
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var boolean
     */
    private $etat;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $lignecommandes;

    /**
     * @var \sil21\VitrineBundle\Entity\Client
     */
    private $client;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->lignecommandes = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set date
     *
     * @param \DateTime $date
     * @return Commande
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set etat
     *
     * @param boolean $etat
     * @return Commande
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return boolean 
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Add lignecommandes
     *
     * @param \sil21\VitrineBundle\Entity\LigneCommande $lignecommandes
     * @return Commande
     */
    public function addLignecommande(\sil21\VitrineBundle\Entity\LigneCommande $lignecommandes)
    {
        $this->lignecommandes[] = $lignecommandes;

        return $this;
    }

    /**
     * Remove lignecommandes
     *
     * @param \sil21\VitrineBundle\Entity\LigneCommande $lignecommandes
     */
    public function removeLignecommande(\sil21\VitrineBundle\Entity\LigneCommande $lignecommandes)
    {
        $this->lignecommandes->removeElement($lignecommandes);
    }

    /**
     * Get lignecommandes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLignecommandes()
    {
        return $this->lignecommandes;
    }

    /**
     * Set client
     *
     * @param \sil21\VitrineBundle\Entity\Client $client
     * @return Commande
     */
    public function setClient(\sil21\VitrineBundle\Entity\Client $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \sil21\VitrineBundle\Entity\Client 
     */
    public function getClient()
    {
        return $this->client;
    }
}

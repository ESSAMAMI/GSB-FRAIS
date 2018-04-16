<?php


namespace PPE3\GsbFraisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FicheFrais
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="PPE3\GsbFraisBundle\Repository\FicheFraisRepository")
 */

class FicheFrais
{

    /**
     * @ORM\Id
     * @ORM\Column(name="mois", type="integer")
     * @ORM\GeneratedValue(strategy="NONE")
     */

    private $mois;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="PPE3\GsbFraisBundle\Entity\Visiteur", cascade={"persist"})
     */
    private $visiteur;

    /**
     * @ORM\ManyToOne(targetEntity="PPE3\GsbFraisBundle\Entity\Etat")
     */
    private $etat;


    /**
     * @var integer
     *
     * @ORM\Column(name="nbJustificatif", type="integer", length=11, nullable=true)
     */
    private $nbJustificatif;


    /**
     * @var decimal
     *
     * @ORM\Column(name="montantValide", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $montant;


    /**
     * @var string
     *
     * @ORM\Column(name="dateModif", type="string", length=12 ,nullable=true)
     */
    private $dateModif;

    public function __construct($visiteur, $mois, $etat, $nbJustificatif, $montant, $dateModif)
    {
        $this->mois = $mois;
        $this->visiteur = $visiteur;
        $this->etat = $etat;
        $this->nbJustificatif = $nbJustificatif;
        $this->montant = $montant;
        $this->dateModif = $dateModif;

    }
    

    /**
     * Set mois
     *
     * @param integer $mois
     *
     * @return FicheFrais
     */
    public function setMois($mois)
    {
        $this->mois = $mois;

        return $this;
    }

    /**
     * Get mois
     *
     * @return integer
     */
    public function getMois()
    {
        return $this->mois;
    }

    /**
     * Set nbJustificatif
     *
     * @param integer $nbJustificatif
     *
     * @return FicheFrais
     */
    public function setNbJustificatif($nbJustificatif)
    {
        $this->nbJustificatif = $nbJustificatif;

        return $this;
    }

    /**
     * Get nbJustificatif
     *
     * @return integer
     */
    public function getNbJustificatif()
    {
        return $this->nbJustificatif;
    }

    /**
     * Set montant
     *
     * @param string $montant
     *
     * @return FicheFrais
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get montant
     *
     * @return string
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Set dateModif
     *
     * @param string $dateModif
     *
     * @return FicheFrais
     */
    public function setDateModif($dateModif)
    {
        $this->dateModif = $dateModif;

        return $this;
    }

    /**
     * Get dateModif
     *
     * @return string
     */
    public function getDateModif()
    {
        return $this->dateModif;
    }

    /**
     * Set visiteur
     *
     * @param \PPE3\GsbFraisBundle\Entity\Visiteur $visiteur
     *
     * @return FicheFrais
     */
    public function setVisiteur(\PPE3\GsbFraisBundle\Entity\Visiteur $visiteur)
    {
        $this->visiteur = $visiteur;

        return $this;
    }

    /**
     * Get visiteur
     *
     * @return \PPE3\GsbFraisBundle\Entity\Visiteur
     */
    public function getVisiteur()
    {
        return $this->visiteur;
    }

    /**
     * Set etat
     *
     * @param \PPE3\GsbFraisBundle\Entity\Etat $etat
     *
     * @return FicheFrais
     */
    public function setEtat(\PPE3\GsbFraisBundle\Entity\Etat $etat = null)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return \PPE3\GsbFraisBundle\Entity\Etat
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Add visiteur
     *
     * @param \PPE3\GsbFraisBundle\Entity\LigneFraisForfait $visiteur
     *
     * @return FicheFrais
     */
    public function addVisiteur(\PPE3\GsbFraisBundle\Entity\LigneFraisForfait $visiteur)
    {
        $this->visiteur[] = $visiteur;

        return $this;
    }

    /**
     * Remove visiteur
     *
     * @param \PPE3\GsbFraisBundle\Entity\LigneFraisForfait $visiteur
     */
    public function removeVisiteur(\PPE3\GsbFraisBundle\Entity\LigneFraisForfait $visiteur)
    {
        $this->visiteur->removeElement($visiteur);
    }
}

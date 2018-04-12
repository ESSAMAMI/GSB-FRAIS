<?php
/**
 * Created by PhpStorm.
 * User: Electro Depot
 * Date: 16/03/2018
 * Time: 19:40
 */

namespace PPE3\GsbFraisBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * LigneFraisForfait
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="PPE3\GsbFraisBundle\Repository\LigneFraisForfaitRepository")
 */

class LigneFraisForfait
{

    /**
     * @var int
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id ;

    /**
     * @ORM\ManyToOne(targetEntity="PPE3\GsbFraisBundle\Entity\FicheFrais", cascade={"persist"})
     * @ORM\JoinColumn(name="visiteur_id", referencedColumnName="visiteur_id")
     */
    private $visiteur;

    /**
     * @ORM\ManyToOne(targetEntity="PPE3\GsbFraisBundle\Entity\FicheFrais", cascade={"persist"})
     * @ORM\JoinColumn(name="mois", referencedColumnName="mois")
     */
    private $mois;


    /**
     * @ORM\ManyToOne(targetEntity="PPE3\GsbFraisBundle\Entity\FraisForfait", cascade={"persist"})
     * @ORM\JoinColumn(name="frais_forfait_id", referencedColumnName="id")
     */
   
    private $fraisForfait;


    /**
     * @var integer
     * @ORM\Column(name="quantite", type="integer", nullable=true)
     */

    private $quantite;


    public function __construct($visiteur, $mois, $fraisForfaits, $quantite)
    {
        $this->visiteur = $visiteur;
        $this->mois = $mois;
        $this->fraisForfait = $fraisForfaits;
        $this->quantite = $quantite;
    }



    /**
     * Set quantite
     *
     * @param integer $quantite
     *
     * @return LigneFraisForfait
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return integer
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set visiteur
     *
     * @param \PPE3\GsbFraisBundle\Entity\FicheFrais $visiteur
     *
     * @return LigneFraisForfait
     */
    public function setVisiteur(\PPE3\GsbFraisBundle\Entity\FicheFrais $visiteur)
    {
        $this->visiteur = $visiteur;

        return $this;
    }

    /**
     * Get visiteur
     *
     * @return \PPE3\GsbFraisBundle\Entity\FicheFrais
     */
    public function getVisiteur()
    {
        return $this->visiteur;
    }

    /**
     * Set mois
     *
     * @param \PPE3\GsbFraisBundle\Entity\FicheFrais $mois
     *
     * @return LigneFraisForfait
     */
    public function setMois(\PPE3\GsbFraisBundle\Entity\FicheFrais $mois)
    {
        $this->mois = $mois;

        return $this;
    }

    /**
     * Get mois
     *
     * @return \PPE3\GsbFraisBundle\Entity\FicheFrais
     */
    public function getMois()
    {
        return $this->mois;
    }

    /**
     * Set fraisForfait
     *
     * @param \PPE3\GsbFraisBundle\Entity\FraisForfait $fraisForfait
     *
     * @return LigneFraisForfait
     */
    public function setFraisForfait(\PPE3\GsbFraisBundle\Entity\FraisForfait $fraisForfait)
    {
        $this->fraisForfait = $fraisForfait;

        return $this;
    }

    /**
     * Get fraisForfait
     *
     * @return \PPE3\GsbFraisBundle\Entity\FraisForfait
     */
    public function getFraisForfait()
    {
        return $this->fraisForfait;
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
}

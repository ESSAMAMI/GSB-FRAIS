<?php
/**
 * Created by PhpStorm.
 * User: Electro Depot
 * Date: 16/03/2018
 * Time: 22:35
 */

namespace PPE3\GsbFraisBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * LigneFraisHotsForfait
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class LigneFraisHorsForfait
{

    /**
     * @var string
     *
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="PPE3\GsbFraisBundle\Entity\FicheFrais")
     * @ORM\JoinColumn(name="visiteur_id", referencedColumnName="visiteur_id")
     */
    private $visiteur;

    /**
     * @ORM\ManyToOne(targetEntity="PPE3\GsbFraisBundle\Entity\FicheFrais")
     * @ORM\JoinColumn(name="mois", referencedColumnName="mois")
     */
    private $mois;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=100, nullable=true)
     */
    private $libelle;

    /**
     * @var date
     *
     * @ORM\Column(name="date", type="date", nullable=true)
     */
    private $date;

    /**
     * @var decimal
     *
     * @ORM\Column(name="montant", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $montant;



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
     * Set libelle
     *
     * @param string $libelle
     *
     * @return LigneFraisHorsForfait
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return LigneFraisHorsForfait
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
     * Set montant
     *
     * @param string $montant
     *
     * @return LigneFraisHorsForfait
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
     * Set visiteur
     *
     * @param \PPE3\GsbFraisBundle\Entity\FicheFrais $visiteur
     *
     * @return LigneFraisHorsForfait
     */
    public function setVisiteur(\PPE3\GsbFraisBundle\Entity\FicheFrais $visiteur = null)
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
     * @return LigneFraisHorsForfait
     */
    public function setMois(\PPE3\GsbFraisBundle\Entity\FicheFrais $mois = null)
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
}

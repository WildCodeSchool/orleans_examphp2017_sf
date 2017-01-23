<?php

namespace QuidditchBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Equipe
 *
 * @ORM\Table(name="equipe")
 * @ORM\Entity(repositoryClass="QuidditchBundle\Repository\EquipeRepository")
 */
class Equipe
{


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
     * @ORM\Column(name="nom_equipe", type="string", length=255)
     */
    private $nomEquipe;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=255)
     */
    private $pays;

    /**
     * @var string
     * @ORM\Column(name="joueur", type="string", length=255)
     *
     */
    private $joueur;

    /**
     * @ORM\OneToOne(targetEntity="Joueurs", inversedBy="joueurequipe")
     */
    private $joueurequipe;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nomEquipe
     *
     * @param string $nomEquipe
     *
     * @return Equipe
     */
    public function setNomEquipe($nomEquipe)
    {
        $this->nomEquipe = $nomEquipe;

        return $this;
    }

    /**
     * Get nomEquipe
     *
     * @return string
     */
    public function getNomEquipe()
    {
        return $this->nomEquipe;
    }

    /**
     * Set pays
     *
     * @param string $pays
     *
     * @return Equipe
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
     * Set joueur
     *
     * @param string $joueur
     *
     * @return Equipe
     */
    public function setJoueur($joueur)
    {
        $this->joueur = $joueur;

        return $this;
    }

    /**
     * Get joueur
     *
     * @return string
     */
    public function getJoueur()
    {
        return $this->joueur;
    }

    /**
     * Set joueurequipe
     *
     * @param \QuidditchBundle\Entity\Joueurs $joueurequipe
     *
     * @return Equipe
     */
    public function setJoueurequipe(\QuidditchBundle\Entity\Joueurs $joueurequipe = null)
    {
        $this->joueurequipe = $joueurequipe;

        return $this;
    }

    /**
     * Get joueurequipe
     *
     * @return \QuidditchBundle\Entity\Joueurs
     */
    public function getJoueurequipe()
    {
        return $this->joueurequipe;
    }
}

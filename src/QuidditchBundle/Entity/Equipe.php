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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=255)
     */
    private $pays;

//	/**
//	 * @var string
//	 *
//	 * @ORM\Column(name="player", type="string", length=255)
//	 */
//	private $player;

	/**
	 *
	 *
	 * @ORM\OneToMany(targetEntity="Joueur", mappedBy="equipe")
	 * 
	 */
	private $joueurs;

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
     * Set nom
     *
     * @param string $nom
     *
     * @return Equipe
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
	 * @return string
	 */
	public function getJoueurs()
	{
		return $this->joueurs;
	}

	/**
	 * @param string $joueurs
	 */
	public function setJoueurs($joueurs)
	{
		$this->joueurs = $joueurs;
	}


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->joueurs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add joueur
     *
     * @param \QuidditchBundle\Entity\joueur $joueur
     *
     * @return Equipe
     */
    public function addJoueur(\QuidditchBundle\Entity\joueur $joueur)
    {
        $this->joueurs[] = $joueur;

        return $this;
    }

    /**
     * Remove joueur
     *
     * @param \QuidditchBundle\Entity\joueur $joueur
     */
    public function removeJoueur(\QuidditchBundle\Entity\joueur $joueur)
    {
        $this->joueurs->removeElement($joueur);
    }

	/**
	 * @param int $id
	 */
	public function setId($id)
	{
		$this->id = $id;
	}



}

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
     * @ORM\Column(name="nom", type="string", length=45)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=45)
     */
    private $pays;

    /**
     * @var string
     *
     * @ORM\Column(name="joueursDeLequipe", type="string", length=255)
     */
    private $joueursDeLequipe;


    /**
     * @ORM\OneToMany(targetEntity="Joueur", mappedBy="equipe")
     */
    private $joueurs;

    /**
     * @return mixed
     */
    public function getJoueurs()
    {
        return $this->joueurs;
    }

    /**
     * @param mixed $joueurs
     */
    public function setJoueurs($joueurs)
    {
        $this->joueurs = $joueurs;
    }



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
     * Set joueursDeLequipe
     *
     * @param string $joueursDeLequipe
     *
     * @return Equipe
     */
    public function setJoueursDeLequipe($joueursDeLequipe)
    {
        $this->joueursDeLequipe = $joueursDeLequipe;

        return $this;
    }

    /**
     * Get joueursDeLequipe
     *
     * @return string
     */
    public function getJoueursDeLequipe()
    {
        return $this->joueursDeLequipe;
    }
}


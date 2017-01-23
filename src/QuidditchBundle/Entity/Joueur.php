<?php

namespace QuidditchBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Joueur
 *
 * @ORM\Table(name="joueur")
 * @ORM\Entity(repositoryClass="QuidditchBundle\Repository\JoueurRepository")
 */
class Joueur
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
     * @ORM\Column(name="nom", type="string", length=255, unique=true)
     */
    private $nom;

    /**
     * @var int
     *
     * @ORM\Column(name="experiance", type="integer")
     */
    private $experiance;

    /**
     * @var int
     *
     * @ORM\Column(name="age", type="integer")
     */
    private $age;

    /**
     * @var int
     *
     * @ORM\Column(name="fatigue", type="integer")
     */
    private $fatigue;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=255, nullable=true)
     */
    private $role;

    /**
     * @ORM\ManyToOne(targetEntity="Equipe", inversedBy="joueurs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $equipe;

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
     * @return Joueur
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
     * Set experiance
     *
     * @param integer $experiance
     *
     * @return Joueur
     */
    public function setExperiance($experiance)
    {
        $this->experiance = $experiance;

        return $this;
    }

    /**
     * Get experiance
     *
     * @return int
     */
    public function getExperiance()
    {
        return $this->experiance;
    }

    /**
     * Set age
     *
     * @param integer $age
     *
     * @return Joueur
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return int
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set fatigue
     *
     * @param integer $fatigue
     *
     * @return Joueur
     */
    public function setFatigue($fatigue)
    {
        $this->fatigue = $fatigue;

        return $this;
    }

    /**
     * Get fatigue
     *
     * @return int
     */
    public function getFatigue()
    {
        return $this->fatigue;
    }

    /**
     * Set role
     *
     * @param string $role
     *
     * @return Joueur
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @return mixed
     */
    public function getEquipe()
    {
        return $this->equipe;
    }

    /**
     * @param mixed $equipe
     */
    public function setEquipe($equipe)
    {
        $this->equipe = $equipe;
    }


}


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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var int
     *
     * @ORM\Column(name="experience", type="integer")
     */
    private $experience;

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
     * @ORM\Column(name="role", type="string", length=255)
     */
    private $role;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Equipe", inversedBy="joueurs")
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
     * Set experience
     *
     * @param integer $experience
     *
     * @return Joueur
     */
    public function setExperience($experience)
    {
        $this->experience = $experience;

        return $this;
    }

    /**
     * Get experience
     *
     * @return int
     */
    public function getExperience()
    {
        return $this->experience;
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
     * Set equipe
     *
     * @param \QuidditchBundle\Entity\Equipe $equipe
     *
     * @return Joueur
     */
    public function setEquipe(\QuidditchBundle\Entity\Equipe $equipe = null)
    {
        $this->equipe = $equipe;

        return $this;
    }

    /**
     * Get equipe
     *
     * @return \QuidditchBundle\Entity\Equipe
     */
    public function getEquipe()
    {
        return $this->equipe;
    }
}

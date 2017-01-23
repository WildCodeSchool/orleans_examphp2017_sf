<?php

namespace QuidditchBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Joueurs
 *
 * @ORM\Table(name="joueurs")
 * @ORM\Entity(repositoryClass="QuidditchBundle\Repository\JoueursRepository")
 */
class Joueurs
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
     * @ORM\Column(name="nom", type="string", length=255)
     *
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
     * @ORM\Column(name="role", type="string", length=50)
     */
    private $role;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=255)
     */
    private $photo;

    /**
     * @ORM\ManyToOne(targetEntity="Equipe", inversedBy="nom")
     */
    private $joueur;

    public function __toString(){
        return $this->photo;
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
     * @return Joueurs
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
     * @return Joueurs
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
     * @return Joueurs
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
     * @return Joueurs
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
     * @return Joueurs
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
     * Set photo
     *
     * @param string $photo
     *
     * @return Joueurs
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    

    /**
     * Set joueur
     *
     * @param \QuidditchBundle\Entity\Equipe $joueur
     *
     * @return Joueurs
     */
    public function setJoueur(\QuidditchBundle\Entity\Equipe $joueur = null)
    {
        $this->joueur = $joueur;

        return $this;
    }

    /**
     * Get joueur
     *
     * @return \QuidditchBundle\Entity\Equipe
     */
    public function getJoueur()
    {
        return $this->joueur;
    }
}

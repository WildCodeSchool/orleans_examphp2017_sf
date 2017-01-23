<?php

namespace QuidditchBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Player
 *
 * @ORM\Table(name="player")
 * @ORM\Entity(repositoryClass="QuidditchBundle\Repository\PlayerRepository")
 */
class Player
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
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="xp", type="integer")
     */
    private $xp;

    /**
     * @var int
     *
     * @ORM\Column(name="age", type="integer")
     */
    private $age;

    /**
     * @var int
     *
     * @ORM\Column(name="tiredness", type="integer")
     */
    private $tiredness;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=255)
     */
    private $role;

    /**
     * @var string
     *
     * @ORM\Column(name="avatar", type="string", length=255)
     */
    private $avatar;

    /**
     * @ORM\OneToMany(targetEntity="QuidditchBundle\Entity\Team", mappedBy="players")
     */
    private $team;


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
     * Set name
     *
     * @param string $name
     *
     * @return Player
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set xp
     *
     * @param integer $xp
     *
     * @return Player
     */
    public function setXp($xp)
    {
        $this->xp = $xp;

        return $this;
    }

    /**
     * Get xp
     *
     * @return int
     */
    public function getXp()
    {
        return $this->xp;
    }

    /**
     * Set age
     *
     * @param integer $age
     *
     * @return Player
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
     * Set tiredness
     *
     * @param integer $tiredness
     *
     * @return Player
     */
    public function setTiredness($tiredness)
    {
        $this->tiredness = $tiredness;

        return $this;
    }

    /**
     * Get tiredness
     *
     * @return int
     */
    public function getTiredness()
    {
        return $this->tiredness;
    }

    /**
     * Set role
     *
     * @param string $role
     *
     * @return Player
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
     * Set avatar
     *
     * @param string $avatar
     *
     * @return Player
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return string
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * @return mixed
     */
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * @param mixed $team
     */
    public function setTeam($team)
    {
        $this->team = $team;
    }


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->team = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add team
     *
     * @param \QuidditchBundle\Entity\Team $team
     *
     * @return Player
     */
    public function addTeam(\QuidditchBundle\Entity\Team $team)
    {
        $this->team[] = $team;

        return $this;
    }

    /**
     * Remove team
     *
     * @param \QuidditchBundle\Entity\Team $team
     */
    public function removeTeam(\QuidditchBundle\Entity\Team $team)
    {
        $this->team->removeElement($team);
    }
}

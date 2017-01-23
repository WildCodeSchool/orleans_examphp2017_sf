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
     * @ORM\Column(name="Name", type="string", length=255)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="Exp", type="integer")
     */
    private $exp;

    /**
     * @var int
     *
     * @ORM\Column(name="Age", type="integer")
     */
    private $age;

    /**
     * @var int
     *
     * @ORM\Column(name="Fatigue", type="integer")
     */
    private $fatigue;

    /**
     * @var string
     *
     * @ORM\Column(name="Role", type="string", length=255)
     */
    private $role;


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
     * Set exp
     *
     * @param integer $exp
     *
     * @return Player
     */
    public function setExp($exp)
    {
        $this->exp = $exp;

        return $this;
    }

    /**
     * Get exp
     *
     * @return int
     */
    public function getExp()
    {
        return $this->exp;
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
     * Set fatigue
     *
     * @param integer $fatigue
     *
     * @return Player
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
}

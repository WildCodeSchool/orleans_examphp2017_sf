<?php

namespace QuidditchBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Team
 *
 * @ORM\Table(name="team")
 * @ORM\Entity(repositoryClass="QuidditchBundle\Repository\TeamRepository")
 */
class Team
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
     * @ORM\Column(name="teamName", type="string", length=255)
     */
    private $teamName;

    /**
     * @var string
     *
     * @ORM\Column(name="teamCountry", type="string", length=255)
     */
    private $teamCountry;

    /**
     * @var string
     *
     * @ORM\Column(name="teamPlayer", type="string", length=255)
     */
    private $teamPlayer;


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
     * Set teamName
     *
     * @param string $teamName
     *
     * @return Team
     */
    public function setTeamName($teamName)
    {
        $this->teamName = $teamName;

        return $this;
    }

    /**
     * Get teamName
     *
     * @return string
     */
    public function getTeamName()
    {
        return $this->teamName;
    }

    /**
     * Set teamCountry
     *
     * @param string $teamCountry
     *
     * @return Team
     */
    public function setTeamCountry($teamCountry)
    {
        $this->teamCountry = $teamCountry;

        return $this;
    }

    /**
     * Get teamCountry
     *
     * @return string
     */
    public function getTeamCountry()
    {
        return $this->teamCountry;
    }

    /**
     * Set teamPlayer
     *
     * @param string $teamPlayer
     *
     * @return Team
     */
    public function setTeamPlayer($teamPlayer)
    {
        $this->teamPlayer = $teamPlayer;

        return $this;
    }

    /**
     * Get teamPlayer
     *
     * @return string
     */
    public function getTeamPlayer()
    {
        return $this->teamPlayer;
    }
}

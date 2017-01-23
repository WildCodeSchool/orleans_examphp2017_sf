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
     * @ORM\Column(name="playerName", type="string", length=255)
     */
    private $playerName;

    /**
     * @var int
     *
     * @ORM\Column(name="playerExperience", type="integer")
     */
    private $playerExperience;

    /**
     * @var int
     *
     * @ORM\Column(name="playerAge", type="integer")
     */
    private $playerAge;

    /**
     * @var int
     *
     * @ORM\Column(name="playerTiredness", type="integer")
     */
    private $playerTiredness;

    /**
     * @var string
     *
     * @ORM\Column(name="playerRole", type="string", length=255)
     */
    private $playerRole;


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
     * Set playerName
     *
     * @param string $playerName
     *
     * @return Player
     */
    public function setPlayerName($playerName)
    {
        $this->playerName = $playerName;

        return $this;
    }

    /**
     * Get playerName
     *
     * @return string
     */
    public function getPlayerName()
    {
        return $this->playerName;
    }

    /**
     * Set playerExperience
     *
     * @param integer $playerExperience
     *
     * @return Player
     */
    public function setPlayerExperience($playerExperience)
    {
        $this->playerExperience = $playerExperience;

        return $this;
    }

    /**
     * Get playerExperience
     *
     * @return int
     */
    public function getPlayerExperience()
    {
        return $this->playerExperience;
    }

    /**
     * Set playerAge
     *
     * @param integer $playerAge
     *
     * @return Player
     */
    public function setPlayerAge($playerAge)
    {
        $this->playerAge = $playerAge;

        return $this;
    }

    /**
     * Get playerAge
     *
     * @return int
     */
    public function getPlayerAge()
    {
        return $this->playerAge;
    }

    /**
     * Set playerTiredness
     *
     * @param integer $playerTiredness
     *
     * @return Player
     */
    public function setPlayerTiredness($playerTiredness)
    {
        $this->playerTiredness = $playerTiredness;

        return $this;
    }

    /**
     * Get playerTiredness
     *
     * @return int
     */
    public function getPlayerTiredness()
    {
        return $this->playerTiredness;
    }

    /**
     * Set playerRole
     *
     * @param string $playerRole
     *
     * @return Player
     */
    public function setPlayerRole($playerRole)
    {
        $this->playerRole = $playerRole;

        return $this;
    }

    /**
     * Get playerRole
     *
     * @return string
     */
    public function getPlayerRole()
    {
        return $this->playerRole;
    }
}

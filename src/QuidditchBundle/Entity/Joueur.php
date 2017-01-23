<?php

namespace QuidditchBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


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
     * @ORM\Column(name="exp", type="integer")
     */
    private $exp;

    /**
     * @var int
     *
     * @ORM\Column(name="age", type="integer")
     */
    private $age;

	/**
	 *
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
     * Set exp
     *
     * @param integer $exp
     *
     * @return Joueur
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
	 * Get role
	 *
	 * @return string
	 */
	public function getRole()
	{
		return $this->role;
	}

//	/**
//	 * @return int
//	 */
//	public function getEquipe()
//	{
//		return $this->equipe;
//	}

	/**
	 * @param int $equipe
	 */
	public function setEquipe($equipe)
	{
		$this->equipe = $equipe;
	}

	/**
	 * @param int $id
	 */
	public function setId($id)
	{
		$this->id = $id;
	}

	/**
	 * Set equipe
	 *
	 * @param \QuidditchBundle\Entity\Equipe $equipe
	 * @return Joueur
	 */
	public function setVille(\QuidditchBundle\Entity\Equipe $equipe = null)
	{
		$this->equipe = $equipe;
		return $this;
	}
	/**
	 * Get equipe
	 *
	 * @return \QuidditchBundle\Entity\Equipe
	 */
	public function getequipe()
	{
		return $this->equipe;
	}

//	/**
//	 * NOTE: This is not a mapped field of entity metadata, just a simple property.
//	 *
//	 * @Vich\UploadableField(mapping="product_image", fileNameProperty="imageName")
//	 *
//	 * @var File
//	 */
//	private $imageFile;
//
//	/**
//	 * @ORM\Column(type="string", length=255)
//	 *
//	 * @var string
//	 */
//	private $imageName;
//
//	/**
//	 * @ORM\Column(type="datetime")
//	 *
//	 * @var \DateTime
//	 */
//	private $updatedAt;
//
//	/**
//	 * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
//	 * of 'UploadedFile' is injected into this setter to trigger the  update. If this
//	 * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
//	 * must be able to accept an instance of 'File' as the bundle will inject one here
//	 * during Doctrine hydration.
//	 *
//	 * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
//	 *
//	 * @return Product
//	 */
//	public function setImageFile(File $image = null)
//	{
//		$this->imageFile = $image;
//
//		if ($image) {
//			// It is required that at least one field changes if you are using doctrine
//			// otherwise the event listeners won't be called and the file is lost
//			$this->updatedAt = new \DateTimeImmutable();
//		}
//
//		return $this;
//	}
//
//	/**
//	 * @return File|null
//	 */
//	public function getImageFile()
//	{
//		return $this->imageFile;
//	}
//
//	/**
//	 * @param string $imageName
//	 *
//	 * @return Product
//	 */
//	public function setImageName($imageName)
//	{
//		$this->imageName = $imageName;
//
//		return $this;
//	}
//
//	/**
//	 * @return string|null
//	 */
//	public function getImageName()
//	{
//		return $this->imageName;
//	}
//
//	public function setImage(File $image = null)
//	{
//		$this->image = $image;
//
//		// Only change the updated af if the file is really uploaded to avoid database updates.
//		// This is needed when the file should be set when loading the entity.
//		if ($this->image instanceof UploadedFile) {
//			$this->updatedAt = new \DateTime('now');
//		}
//	}
}

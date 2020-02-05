<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArtistsRepository")
 */
class Artists implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nickname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $photo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $category;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $facebook_link;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $twitter_link;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $youtube_link;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $wordpress_link;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Fans", inversedBy="favoris")
     */
    private $fans;

    public function __construct()
    {
        $this->fans = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getNickname(): ?string
    {
        return $this->nickname;
    }

    public function setNickname(string $nickname): self
    {
        $this->nickname = $nickname;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getFacebookLink(): ?string
    {
        return $this->facebook_link;
    }

    public function setFacebookLink(?string $facebook_link): self
    {
        $this->facebook_link = $facebook_link;

        return $this;
    }

    public function getTwitterLink(): ?string
    {
        return $this->twitter_link;
    }

    public function setTwitterLink(?string $twitter_link): self
    {
        $this->twitter_link = $twitter_link;

        return $this;
    }

    public function getYoutubeLink(): ?string
    {
        return $this->youtube_link;
    }

    public function setYoutubeLink(?string $youtube_link): self
    {
        $this->youtube_link = $youtube_link;

        return $this;
    }

    public function getWordpressLink(): ?string
    {
        return $this->wordpress_link;
    }

    public function setWordpressLink(?string $wordpress_link): self
    {
        $this->wordpress_link = $wordpress_link;

        return $this;
    }

    /**
     * @return Collection|Fans[]
     */
    public function getFans(): Collection
    {
        return $this->fans;
    }

    public function addFan(Fans $fan): self
    {
        if (!$this->fans->contains($fan)) {
            $this->fans[] = $fan;
        }

        return $this;
    }

    public function removeFan(Fans $fan): self
    {
        if ($this->fans->contains($fan)) {
            $this->fans->removeElement($fan);
        }

        return $this;
    }
}

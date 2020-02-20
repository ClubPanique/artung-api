<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArtistsRepository")
 */
class Artists
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

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
     * @ORM\Column(type="string", length=255)
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

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", mappedBy="artist", cascade={"persist", "remove"})
     */
    private $user;

    public function __construct()
    {
        $this->fans = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        // set (or unset) the owning side of the relation if necessary
        $newArtist = null === $user ? null : $this;
        if ($user->getArtist() !== $newArtist) {
            $user->setArtist($newArtist);
        }

        return $this;
    }
}

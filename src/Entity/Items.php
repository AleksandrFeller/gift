<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ItemsRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\String\ByteString;

/**
 * @ORM\Entity(repositoryClass=ItemsRepository::class)
 * @UniqueEntity("slug")
 * @ORM\HasLifecycleCallbacks()
 */
#[ApiResource]
class Items
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $picture;

    /**
     * @ORM\ManyToOne(targetEntity=ItemsSections::class, inversedBy="items")
     */
    private $section;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $xml;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $slug;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getSection(): ?ItemsSections
    {
        return $this->section;
    }

    public function setSection(?ItemsSections $section): self
    {
        $this->section = $section;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getXml(): ?string
    {
        return $this->xml;
    }

    public function setXml(string $xml): self
    {
        $this->xml = $xml;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /**
    * @ORM\PrePersist
    */
    public function setValue()
    {
        $this->createdAt = new \DateTime();
    }


    public function computeXml() {
        if ((!$this->xml)||('-'===$this->xml))
            $this->xml=ByteString::fromRandom(12);
    }
    public function computeSlug(SluggerInterface $slugger) {
        if (!$this->slug || '-' === $this->slug) {
            $this->slug='rr';
            //$this->slug = $slugger->slug((string) $this)->lower();
        }
    }
}

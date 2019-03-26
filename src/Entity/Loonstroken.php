<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LoonstrokenRepository")
 */
class Loonstroken
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Contract")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Contract_id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $bestand;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $maand;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $jaar;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContractId(): ?Contract
    {
        return $this->Contract_id;
    }

    public function setContractId(?Contract $Contract_id): self
    {
        $this->Contract_id = $Contract_id;

        return $this;
    }

    public function getBestand(): ?string
    {
        return $this->bestand;
    }

    public function setBestand(?string $bestand): self
    {
        $this->bestand = $bestand;

        return $this;
    }

    public function getMaand(): ?string
    {
        return $this->maand;
    }

    public function setMaand(string $maand): self
    {
        $this->maand = $maand;

        return $this;
    }

    public function getJaar(): ?string
    {
        return $this->jaar;
    }

    public function setJaar(?string $jaar): self
    {
        $this->jaar = $jaar;

        return $this;
    }
}

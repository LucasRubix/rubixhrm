<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContractRepository")
 */
class Contract
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $User_id;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $begindatum;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $einddatum;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $uren;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $brutosalaris;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $vrije_dagen;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $bestandslocatie;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?User
    {
        return $this->User_id;
    }

    public function setUserId(User $User_id): self
    {
        $this->User_id = $User_id;

        return $this;
    }

    public function getBegindatum(): ?\DateTimeInterface
    {
        return $this->begindatum;
    }

    public function setBegindatum(?\DateTimeInterface $begindatum): self
    {
        $this->begindatum = $begindatum;

        return $this;
    }

    public function getEinddatum(): ?\DateTimeInterface
    {
        return $this->einddatum;
    }

    public function setEinddatum(?\DateTimeInterface $einddatum): self
    {
        $this->einddatum = $einddatum;

        return $this;
    }

    public function getUren(): ?float
    {
        return $this->uren;
    }

    public function setUren(?float $uren): self
    {
        $this->uren = $uren;

        return $this;
    }

    public function getBrutosalaris(): ?float
    {
        return $this->brutosalaris;
    }

    public function setBrutosalaris(?float $brutosalaris): self
    {
        $this->brutosalaris = $brutosalaris;

        return $this;
    }

    public function getVrijeDagen(): ?int
    {
        return $this->vrije_dagen;
    }

    public function setVrijeDagen(?int $vrije_dagen): self
    {
        $this->vrije_dagen = $vrije_dagen;

        return $this;
    }

    public function getBestandslocatie(): ?string
    {
        return $this->bestandslocatie;
    }

    public function setBestandslocatie(?string $bestandslocatie): self
    {
        $this->bestandslocatie = $bestandslocatie;

        return $this;
    }
}

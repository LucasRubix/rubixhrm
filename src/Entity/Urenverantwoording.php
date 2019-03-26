<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UrenverantwoordingRepository")
 */
class Urenverantwoording
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Stagiair")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Stagiair_id;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $datum;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $uren;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $begintijd;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $eindtijd;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $omschrijving;

    /**
     * @ORM\Column(type="boolean")
     */
    private $goedgekeurd;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStagiairId(): ?Stagiair
    {
        return $this->Stagiair_id;
    }

    public function setStagiairId(?Stagiair $Stagiair_id): self
    {
        $this->Stagiair_id = $Stagiair_id;

        return $this;
    }

    public function getDatum(): ?\DateTimeInterface
    {
        return $this->datum;
    }

    public function setDatum(?\DateTimeInterface $datum): self
    {
        $this->datum = $datum;

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

    public function getBegintijd(): ?\DateTimeInterface
    {
        return $this->begintijd;
    }

    public function setBegintijd(?\DateTimeInterface $begintijd): self
    {
        $this->begintijd = $begintijd;

        return $this;
    }

    public function getEindtijd(): ?\DateTimeInterface
    {
        return $this->eindtijd;
    }

    public function setEindtijd(?\DateTimeInterface $eindtijd): self
    {
        $this->eindtijd = $eindtijd;

        return $this;
    }

    public function getOmschrijving(): ?string
    {
        return $this->omschrijving;
    }

    public function setOmschrijving(?string $omschrijving): self
    {
        $this->omschrijving = $omschrijving;

        return $this;
    }

    public function getGoedgekeurd(): ?bool
    {
        return $this->goedgekeurd;
    }

    public function setGoedgekeurd(bool $goedgekeurd): self
    {
        $this->goedgekeurd = $goedgekeurd;

        return $this;
    }
}

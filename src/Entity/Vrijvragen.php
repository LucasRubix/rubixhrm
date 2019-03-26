<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VrijvragenRepository")
 */
class Vrijvragen
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
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
     * @ORM\Column(type="time", nullable=true)
     */
    private $begintijd;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $eindtijd;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $reden;

    /**
     * @ORM\Column(type="boolean")
     */
    private $goedgekeurd;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?User
    {
        return $this->User_id;
    }

    public function setUserId(?User $User_id): self
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

    public function getReden(): ?string
    {
        return $this->reden;
    }

    public function setReden(?string $reden): self
    {
        $this->reden = $reden;

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

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StagiairRepository")
 */
class Stagiair
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", cascade={"persist", "remove"})
     */
    private $User_id;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $urentotaal;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $begindatum;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $einddatum;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $school;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $contactpersoon;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $contactpersoon_email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $contactpersoon_telefoonnr;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $urenperdag;

    public function __construct()
    {
        /* Zorgt dat in /new de huidige datum en tijd wordeb weergeven */

        $this->begindatum = new \DateTime();
        $this->einddatum = new \DateTime();

    }

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

    public function getUrentotaal(): ?float
    {
        return $this->urentotaal;
    }

    public function setUrentotaal(?float $urentotaal): self
    {
        $this->urentotaal = $urentotaal;

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

    public function getSchool(): ?string
    {
        return $this->school;
    }

    public function setSchool(?string $school): self
    {
        $this->school = $school;

        return $this;
    }

    public function getContactpersoon(): ?string
    {
        return $this->contactpersoon;
    }

    public function setContactpersoon(?string $contactpersoon): self
    {
        $this->contactpersoon = $contactpersoon;

        return $this;
    }

    public function getContactpersoonEmail(): ?string
    {
        return $this->contactpersoon_email;
    }

    public function setContactpersoonEmail(?string $contactpersoon_email): self
    {
        $this->contactpersoon_email = $contactpersoon_email;

        return $this;
    }

    public function getContactpersoonTelefoonnr(): ?string
    {
        return $this->contactpersoon_telefoonnr;
    }

    public function setContactpersoonTelefoonnr(?string $contactpersoon_telefoonnr): self
    {
        $this->contactpersoon_telefoonnr = $contactpersoon_telefoonnr;

        return $this;
    }

    public function getUrenperdag()
    {
        return $this->urenperdag;
    }

    public function setUrenperdag($urenperdag): self
    {
        $this->urenperdag = $urenperdag;

        return $this;
    }
}

<?php
// src/Entity/User.php

namespace App\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    private $naam;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tussenvoegsel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $achternaam;

    /**
     * @ORM\Column(type="date")
     */
    private $geboortedatum;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $telefoonnr;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adres;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $postcode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $plaats;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $profielfoto;

    /**
     * @ORM\Column(type="integer")
     */
    private $idkaartnummer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $iban;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $facebook;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $linkedin;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    public function getTussenvoegsel(): ?string
    {
        return $this->tussenvoegsel;
    }

    public function setTussenvoegsel(?string $tussenvoegsel): self
    {
        $this->tussenvoegsel = $tussenvoegsel;

        return $this;
    }

    public function getAchternaam(): ?string
    {
        return $this->achternaam;
    }

    public function setAchternaam(string $achternaam): self
    {
        $this->achternaam = $achternaam;

        return $this;
    }

    public function getGeboortedatum(): ?\DateTimeInterface
    {
        return $this->geboortedatum;
    }

    public function setGeboortedatum(\DateTimeInterface $geboortedatum): self
    {
        $this->geboortedatum = $geboortedatum;

        return $this;
    }

    public function getTelefoonnr(): ?string
    {
        return $this->telefoonnr;
    }

    public function setTelefoonnr(?string $telefoonnr): self
    {
        $this->telefoonnr = $telefoonnr;

        return $this;
    }

    public function getAdres(): ?string
    {
        return $this->adres;
    }

    public function setAdres(string $adres): self
    {
        $this->adres = $adres;

        return $this;
    }

    public function getPostcode(): ?string
    {
        return $this->postcode;
    }

    public function setPostcode(string $postcode): self
    {
        $this->postcode = $postcode;

        return $this;
    }

    public function getPlaats(): ?string
    {
        return $this->plaats;
    }

    public function setPlaats(string $plaats): self
    {
        $this->plaats = $plaats;

        return $this;
    }

    public function getProfielfoto(): ?string
    {
        return $this->profielfoto;
    }

    public function setProfielfoto(string $profielfoto): self
    {
        $this->profielfoto = $profielfoto;

        return $this;
    }

    public function getIdkaartnummer(): ?int
    {
        return $this->idkaartnummer;
    }

    public function setIdkaartnummer(int $idkaartnummer): self
    {
        $this->idkaartnummer = $idkaartnummer;

        return $this;
    }

    public function getIban(): ?string
    {
        return $this->iban;
    }

    public function setIban(string $iban): self
    {
        $this->iban = $iban;

        return $this;
    }

    public function getFacebook(): ?string
    {
        return $this->facebook;
    }

    public function setFacebook(?string $facebook): self
    {
        $this->facebook = $facebook;

        return $this;
    }

    public function getLinkedin(): ?string
    {
        return $this->linkedin;
    }

    public function setLinkedin(?string $linkedin): self
    {
        $this->linkedin = $linkedin;

        return $this;
    }
}
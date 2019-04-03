<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ZiekRepository")
 */
class Ziek
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
     * @ORM\Column(type="date")
     */
    private $datum;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $datumbeter;

    public function __construct()
    {
        /* Zorgt dat in /new de huidige datum en tijd wordeb weergeven */

        $this->datumbeter = new \DateTime();

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

    public function getDatum(): ?\DateTimeInterface
    {
        return $this->datum;
    }

    public function setDatum(\DateTimeInterface $datum): self
    {
        $this->datum = $datum;

        return $this;
    }

    public function getDatumbeter(): ?\DateTimeInterface
    {
        return $this->datumbeter;
    }

    public function setDatumbeter(?\DateTimeInterface $datumbeter): self
    {
        $this->datumbeter = $datumbeter;

        return $this;
    }
}

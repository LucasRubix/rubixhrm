<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HandigeLinksRepository")
 */
class HandigeLinks
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
    private $Unaam;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $downloadlink;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUnaam(): ?string
    {
        return $this->Unaam;
    }

    public function setUnaam(string $Unaam): self
    {
        $this->Unaam = $Unaam;

        return $this;
    }

    public function getDownloadlink(): ?string
    {
        return $this->downloadlink;
    }

    public function setDownloadlink(?string $downloadlink): self
    {
        $this->downloadlink = $downloadlink;

        return $this;
    }
}

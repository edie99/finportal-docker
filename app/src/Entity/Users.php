<?php

namespace App\Entity;

use App\Repository\UsersRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UsersRepository::class)
 */
class Users
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $meno;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $priezvisko;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresa;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $tel_cislo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMeno(): ?string
    {
        return $this->meno;
    }

    public function setMeno(string $meno): self
    {
        $this->meno = $meno;

        return $this;
    }

    public function getPriezvisko(): ?string
    {
        return $this->priezvisko;
    }

    public function setPriezvisko(string $priezvisko): self
    {
        $this->priezvisko = $priezvisko;

        return $this;
    }

    public function getAdresa(): ?string
    {
        return $this->adresa;
    }

    public function setAdresa(string $adresa): self
    {
        $this->adresa = $adresa;

        return $this;
    }

    public function getTelCislo(): ?string
    {
        return $this->tel_cislo;
    }

    public function setTelCislo(?string $tel_cislo): self
    {
        $this->tel_cislo = $tel_cislo;

        return $this;
    }

}

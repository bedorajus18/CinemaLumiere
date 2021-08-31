<?php

namespace App\Entity;
use App\Repository\SeanceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SeanceRepository::class)
 */
class Seance
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateFin;

    /**
     * @ORM\Column(type="integer")
     */
    private $numeroSalle;

    /**
     * @ORM\ManyToOne(targetEntity=Film::class, inversedBy="seances")
     * @ORM\JoinColumn(nullable=false)
     */
    private $film;

    public static function creer($pDateDebut,$pDateFin,$pNumeroSalle,$pFilm)
    {
        $seance = new Seance();
        $seance->dateDebut = $pDateDebut; 
        $seance->dateFin = $pDateFin;
        $seance->numeroSalle = $pNumeroSalle;
        $seance->film = $pFilm;
        return $seance;
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getNumeroSalle(): ?int
    {
        return $this->numeroSalle;
    }

    public function setNumeroSalle(int $numeroSalle): self
    {
        $this->numeroSalle = $numeroSalle;

        return $this;
    }

    public function getFilm(): ?Film
    {
        return $this->film;
    }

    public function setFilm(?Film $film): self
    {
        $this->film = $film;

        return $this;
    }

    function __toString()
    {
        return $this->numeroSalle;
    
    }
}

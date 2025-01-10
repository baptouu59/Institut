<?php

namespace App\Entity;

use App\Repository\StageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StageRepository::class)]
class Stage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 20)]
    private string $code;

    #[ORM\Column(type: 'string', length: 255)]
    private string $libelle;

    #[ORM\Column(type: 'date')]
    private \DateTimeInterface $dateDebut;

    #[ORM\ManyToMany(targetEntity: Matiere::class, inversedBy: 'stages')]
    private Collection $matieres;

    #[ORM\ManyToMany(targetEntity: Stagiaire::class, inversedBy: 'stages')]
    private Collection $stagiaires;

    public function __construct()
    {
        $this->matieres = new ArrayCollection();
        $this->stagiaires = new ArrayCollection();
    }

}


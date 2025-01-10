<?php

namespace App\Entity;

use App\Repository\ProfesseurRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProfesseurRepository::class)]
class Professeur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'integer')]
    private int $matricule;

    #[ORM\Column(type: 'string', length: 20)]
    private string $nom;

    #[ORM\Column(type: 'string', length: 20)]
    private string $prenom;

    #[ORM\OneToOne(mappedBy: 'professeur', targetEntity: Matiere::class, cascade: ['persist', 'remove'])]
    private ?Matiere $matiere = null;

}


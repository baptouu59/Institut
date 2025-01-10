<?php

namespace App\Entity;

use App\Repository\StagiaireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StagiaireRepository::class)]
class Stagiaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 20)]
    private string $nom;

    #[ORM\Column(type: 'string', length: 255)]
    private string $adresse;

    #[ORM\Column(type: 'string', length: 10)]
    private string $code;

    #[ORM\Column(type: 'string', length: 50)]
    private string $ville;

    #[ORM\Column(type: 'date')]
    private \DateTimeInterface $dateInscription;

    #[ORM\ManyToMany(targetEntity: Stage::class, mappedBy: 'stagiaires')]
    private Collection $stages;

    public function __construct()
    {
        $this->stages = new ArrayCollection();
    }

}

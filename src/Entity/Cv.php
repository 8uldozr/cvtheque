<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CvRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=CvRepository::class)
 */
class Cv
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Formation::class, mappedBy="id_cv", orphanRemoval=true)
     */
    private $id_formation;

    /**
     * @ORM\OneToMany(targetEntity=Experiences::class, mappedBy="id_cv", orphanRemoval=true)
     */
    private $id_experiences;

    /**
     * @ORM\OneToMany(targetEntity=Skills::class, mappedBy="id_cv", orphanRemoval=true)
     */
    private $id_skills;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $url_perso;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $video;

    /**
     * @ORM\OneToOne(targetEntity=Candidate::class, mappedBy="id_cv", cascade={"persist", "remove"})
     */
    private $id_candidate;

    public function __construct()
    {
        $this->id_formation = new ArrayCollection();
        $this->id_experiences = new ArrayCollection();
        $this->id_skills = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Formation[]
     */
    public function getIdFormation(): Collection
    {
        return $this->id_formation;
    }

    public function addIdFormation(Formation $id_cv): self
    {
        if (!$this->id_formation->contains($id_cv)) {
            $this->id_formation[] = $id_cv;
            $id_cv->setIdCv($this);
        }

        return $this;
    }

    public function removeIdFormation(Formation $id_cv): self
    {
        if ($this->id_formation->removeElement($id_cv)) {
            // set the owning side to null (unless already changed)
            if ($id_cv->getIdCv() === $this) {
                $id_cv->setIdCv(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Experiences[]
     */
    public function getIdExperiences(): Collection
    {
        return $this->id_experiences;
    }

    public function addIdExperience(Experiences $idExperience): self
    {
        if (!$this->id_experiences->contains($idExperience)) {
            $this->id_experiences[] = $idExperience;
            $idExperience->setIdCv($this);
        }

        return $this;
    }

    public function removeIdExperience(Experiences $idExperience): self
    {
        if ($this->id_experiences->removeElement($idExperience)) {
            // set the owning side to null (unless already changed)
            if ($idExperience->getIdCv() === $this) {
                $idExperience->setIdCv(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Skills[]
     */
    public function getIdSkills(): Collection
    {
        return $this->id_skills;
    }

    public function addIdSkill(Skills $idSkill): self
    {
        if (!$this->id_skills->contains($idSkill)) {
            $this->id_skills[] = $idSkill;
            $idSkill->setIdCv($this);
        }

        return $this;
    }

    public function removeIdSkill(Skills $idSkill): self
    {
        if ($this->id_skills->removeElement($idSkill)) {
            // set the owning side to null (unless already changed)
            if ($idSkill->getIdCv() === $this) {
                $idSkill->setIdCv(null);
            }
        }

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getUrlPerso(): ?string
    {
        return $this->url_perso;
    }

    public function setUrlPerso(string $url_perso): self
    {
        $this->url_perso = $url_perso;

        return $this;
    }

    public function getVideo(): ?string
    {
        return $this->video;
    }

    public function setVideo(string $video): self
    {
        $this->video = $video;

        return $this;
    }

    public function getIdCandidate(): ?Candidate
    {
        return $this->id_candidate;
    }

    public function setIdCandidate(?Candidate $id_candidate): self
    {
        // unset the owning side of the relation if necessary
        if ($id_candidate === null && $this->id_candidate !== null) {
            $this->id_candidate->setIdCv(null);
        }

        // set the owning side of the relation if necessary
        if ($id_candidate !== null && $id_candidate->getIdCv() !== $this) {
            $id_candidate->setIdCv($this);
        }

        $this->id_candidate = $id_candidate;

        return $this;
    }
}

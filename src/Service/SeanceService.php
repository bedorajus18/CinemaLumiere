<?php

namespace App\Service;

use App\Entity\Seance;
use App\Entity\ICrud;
use Doctrine\ORM\EntityManagerInterface;


class SeanceService implements ICrud
{
    private $entityManager;
    public function __construct(EntityManagerInterface $em)
    {
        $this->entityManager = $em;
    }
    /*function ajouter($pDateDebut,$pDateFin,$pNumeroSalle,$pFilm)
    {
        $seance = Seance::creer($pDateDebut,$pDateFin,$pNumeroSalle,$pFilm);
        $this->entityManager->persist($seance);
        $this->entityManager->flush();
    }
    */
    public function ajouter($pData)
    {
        // la fonction static permet d'éviter de devoir instantier le film avec le
        // constructeur par défaut
        $seance = Seance::creer(
            $pData->getDateDebut(),
            $pData->getDateFin(),
            $pData->getNumeroSalle(),
            $pData->getFilm()
        );
        $this->entityManager->persist($seance);
        $this->entityManager->flush();
    }
    public function supprimer($pId)
    {
    }
    public function liste()
    {
        return $this->entityManager->getRepository(Seance::class)->findAll();
    }
    public function lire($pId)
    {
        return $this->entityManager->getRepository(Seance::class)->find($pId);
    }
    public function sauvegarder()
    {
    }
}

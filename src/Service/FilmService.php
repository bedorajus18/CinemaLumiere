<?php

namespace App\Service;

use App\Entity\Film;
use App\Entity\ICrud;
use Doctrine\ORM\EntityManagerInterface;

class FilmService implements ICrud
{
    private $entityManager;
    function __construct(EntityManagerInterface $em)
    {
        $this->entityManager = $em;
    }
    /*function ajouter($pTitre, $pResume, $pAnneeProduction, $pRealisateur, $pListeActeurs, $pImageURL)
    {
        $film = Film::creer($pTitre, $pResume, $pAnneeProduction, $pRealisateur, $pListeActeurs, $pImageURL);
        $this->entityManager->persist($film);
        $this->entityManager->flush();
        // La fonction static permet d'éviter de devoir instancier le film avec le 
        // constructeur par défaut.
    }
    */
    public function ajouter($pData)
    {
        // la fonction static permet d'éviter de devoir instantier le film avec le
        // constructeur par défaut
        $film = Film::creer($pData->getTitre(),
        $pData->getResume(),
        $pData->getAnneeProduction(),
        $pData->getRealisateur(),
        $pData->getListeActeurs(),
        $pData->getImageUrl());
        $this->entityManager->persist($film);
        $this->entityManager->flush();
    }
    public function liste()
    {
        return $this->entityManager->getRepository(Film::class)->findAll();
    }
    public function lire($pId)
    {
        return $this->entityManager->getRepository(Film::class)->find($pId);
    }
    public function sauvegarder()
    {
    }
    public function supprimer($pId)
    {
    }
}

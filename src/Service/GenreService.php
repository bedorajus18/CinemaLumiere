<?php

namespace App\Service;

use App\Entity\Genre;
use App\Entity\ICrud;
use Doctrine\ORM\EntityManagerInterface;


class GenreService implements ICrud
{
    private $entityManager;
    public function __construct(EntityManagerInterface $em)
    {
        $this->entityManager = $em;
    }
    /*function ajouter($pIntitule)
    {
        $genre = Genre::creer($pIntitule);
        $this->entityManager->persist($genre);
        $this->entityManager->flush();
    }
    */
    public function ajouter($pData)
    {
        // la fonction static permet d'éviter de devoir instantier le film avec le
        // constructeur par défaut
        $genre = Genre::creer($pData->getIntitule());
        $this->entityManager->persist($genre);
        $this->entityManager->flush();
    }

    public function supprimer($pId)
    {
    }
    public function liste()
    {
        return $this->entityManager->getRepository(Genre::class)->findAll();
    }
    public function lire($pId)
    {
        return $this->entityManager->getRepository(Genre::class)->find($pId);
    }
    public function sauvegarder()
    {
        
    }
}

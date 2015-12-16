<?php

namespace MyMovies\DAO;

use MyMovies\Domain\Film;

class FilmDAO extends DAO
{
    private $categorieDAO;

    public function setCategorieDAO(CategorieDAO $categorieDAO) {
        $this->CategorieDAO = $categorieDAO;
    }
    public function findAll() {
        $sql = "select * from movie order by mov_title";
        $result = $this->getDb()->fetchAll($sql);
        
        // Convertit les résultats de requête en tableau d'objets du domaine
        $films = array();
        foreach ($result as $row) {
            $filmId = $row['mov_id'];
            $films[$filmId] = $this->buildDomainObject($row);
        }
        return $films;
    }
    public function findAllByFamille($familleId) {
        $sql = "select * from movie where mov_id=? order by mov_title";
        $result = $this->getDb()->fetchAll($sql, array($cat_id));
        
        // Convertit les résultats de requête en tableau d'objets du domaine
        $films = array();
        foreach ($result as $row) {
            $filmId = $row['mov_id'];
            $films[$filmId] = $this->buildDomainObject($row);
        }
        return $films;
    }
    public function find($id) {
        $sql = "select * from movie where mov_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("Aucun film ne correspond à l'identifiant " . $id);
    }
    protected function buildDomainObject($row) {
        $film = new Medicament();
        $film->setId($row['mov_id']);
        $film->setTitre($row['mov_title']);
        $film->setDescriptionC($row['mov_description_short']);
        $film->setDescriptionL($row['mov_description_long']);
        $film->setproducteur($row['mov_director']);
        $film->setAnnee($row['mov_year']);
        $film->setImage($row['mov_image']);

        if (array_key_exists('cat_id', $row)) {
            // Trouve et définit la famille associée
            $categorieId = $row['cat_id'];
            $categorie = $this->familleDAO->find($categorieId);
            $film->setCatgorie($categorie);
        }
   
        return $film;
    }
}
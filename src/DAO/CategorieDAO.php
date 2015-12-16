<?php

namespace MyMovies\DAO;

use MyMovies\Domain\Categorie;

class CategorieDAO extends DAO
{
    public function findAll() {
        $sql = "select * from category order by cat_name";
        $result = $this->getDb()->fetchAll($sql);
        
        // Convertit les résultats de requête en tableau d'objets du domaine
        $categories = array();
        foreach ($result as $row) {
            $categorieId = $row['id_categorie'];
            $categories[$categorieId] = $this->buildDomainObject($row);
        }
        return $categories;
    }

    public function find($id) {
        $sql = "select * from category where cat_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("Aucune Categorie ne correspond à l'identifiant " . $id);
    }
    protected function buildDomainObject($row) {
        $categorie = new Categorie();
        $categorie->setId($row['cat_id']);
        $categorie->setLibelle($row['cat_name']);
        return $categorie;
    }
}
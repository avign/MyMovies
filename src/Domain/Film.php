<?php

namespace MyMovies\Domain;

class Film 
{
    private $id;
    private $titre;
    private $descriptionC;
    private $descriptionL;
    private $producteur;
    private $annee;
    private $image;
    private $categorie;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getTitre() {
        return $this->titre;
    }

    public function setTitre($titre) {
        $this->titre = $titre;
    }

    public function getDescriptionC() {
        return $this->descriptionC;
    }

    public function setDescriptionC($descriptionC) {
        $this->descriptionC = $descriptionC;
    }

    public function getDescriptionL() {
        return $this->descriptionL;
    }

    public function setDescriptionL($descriptionL) {
        $this->descriptionL = $descriptionL;
    }
    
    public function getProducteur() {
        return $this->producteur;
    }

    public function setProducteur($producteur) {
        $this->producteur = $producteur;
    }

    public function getAnnee() {
        return $this->annee;
    }

    public function setAnnee($annee) {
        $this->annee = $annee;
    }

    public function getImage() {
        return $this->image;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public function getCategorie() {
        return $this->categorie;
    }

    public function setCategorie(Categorie $categorie) {
        $this->categorie = $categorie;
    }
}

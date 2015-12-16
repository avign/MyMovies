<?php

namespace MyMovies\DAO;

use Doctrine\DBAL\Connection;

abstract class DAO 
{
    /**
     * connection BDD
     *
     * @var \Doctrine\DBAL\Connection
     */
    private $db;

    /**
     * Constructeur
     *
     * @param \Doctrine\DBAL\Connection The database connection object
     */
    public function __construct(Connection $db) {
        $this->db = $db;
    }

    /**
     * Donne les droits de connections
     *
     * @return \Doctrine\DBAL\Connection The database connection object
     */
    protected function getDb() {
        return $this->db;
    }

    /**
     * crée un objet du type de la ligne.
     */
    protected abstract function buildDomainObject($row);
}
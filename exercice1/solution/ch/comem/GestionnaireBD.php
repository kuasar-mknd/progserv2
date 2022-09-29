<?php

namespace ch\comem;

/**
 * Regroupement du code qui s'occupe de la base de donnée
 */
class GestionnaireBD {

    private $db;

    /**
     * Crée un gestionnaire de base de donnée
     */
    public function __construct() {
        $this->db = new \SQLite3('db/bd.sqlite');
        $this->creeTablePasswordsSiBesoin();
    }

    /**
     * Ajoute le mot de passe à la bd
     */
    public function ajouteMotDePasse(string $motDePasse): bool {
        $motDePasseEncrypte = md5($motDePasse);
        $sql = <<<COMMANDE_SQL
      INSERT INTO PASSWORDS (PASSWORD)
      VALUES ('$motDePasseEncrypte');
COMMANDE_SQL;

        return @$this->db->exec($sql);
        //return mt_rand(0, 1);
    }

    /**
     * Rend true si le mot de passe se trouve dans la base de donnée
     */
    public function motDePasseExiste(string $motDePasse): bool {
        $motDePasseEncrypte = md5($motDePasse);
        $sql = <<<COMMANDE_SQL
      SELECT COUNT(PASSWORD) FROM PASSWORDS WHERE PASSWORD = '$motDePasseEncrypte' ;
COMMANDE_SQL;

        $count = $this->db->querySingle($sql);
        return $count > 0;
        //return mt_rand(0, 1);
    }

    private function creeTablePasswordsSiBesoin() {
        $sql = <<<COMMANDE_SQL
      CREATE TABLE PASSWORDS (
          PASSWORD TEXT PRIMARY KEY NOT NULL
      )
COMMANDE_SQL;

        // le @ permet de bypasser l'erreur au cas où la table existe déjà ;-)
        $ret = @$this->db->exec($sql);
        if ($ret) {
            echo "La table PASSWORDS a été crée", "<br>";
        }
    }
    
    public function ferme() {
        $this->db->close();
    }
}
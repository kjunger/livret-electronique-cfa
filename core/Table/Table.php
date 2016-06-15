<?php
namespace Core\Table;
use \Core\Database\Database;
/**
 * Classe mère Core\Table
 * Contient les méthodes pour effectuer des requêtes génériques sur une table de la base de données
 */
class Table {
    protected $table;
    protected $db;
    /**
     * Constructeur de la classe mère Table
     * @private
     * @param object Database $db Demande un objet de classe Database pour pouvoir intéragir avec les tables d'une base de données
     */
    public function __construct(Database $db) {
        $this->db = $db;
        if (is_null($this->table)) {
            $parts       = explode('\\', get_class($this));
            $class_name  = end($parts);
            $this->table = str_replace('Table', '', $class_name);
        }
    }
    /**
     * Méthode all() - Exécute une requête SQL demandant la récupération de toutes les données d'une table
     * @return object Retourne un objet de classe avec les résultats de la requête
     */
    public function all() {
        return $this->query('SELECT * FROM ' . $this->table);
    }
    /**
     * Méthode allWhere() - Exécute une requête SQL demandant la récupération de toutes les données d'une table quand l'ID d'une ligne équivaut à $id
     * @param  integer $id            L'id associé aux résultats souhaités
     * @param  string  [$append=null] Paramètre optionnel - dans le cas où le champ id ne s'appelle pas simplement id (exemple : "idNomDeLaTable") - stocke une string avec le suffixe à utiliser, ou équivaut à null par défaut
     * @return object   Retourne un objet avec les résultats de la requête
     */
    public function allWhere($id, $append=null) {   //Redondance avec find() ?
        if(is_null($append)) {
            $append = $this->table;
        }
        return $this->query("SELECT * FROM {$this->table} WHERE id". ucfirst($append) ." = ?", [$id]);
    }
    /**
     * Méthode find() - Exécute une requête SQL demandant la récupération de toutes les données d'une table quand l'id d'une ligne est égal à $id
     * @param  integer $id            L'id associé aux résultats souhaités
     * @param  string  [$append=null] Paramètre optionnel - dans le cas où le champ id ne s'appelle pas simplement id (exemple : "idNomDeLaTable") - stocke une string avec le suffixe à utiliser, ou équivaut à null par défaut
     * @return object  Retourne un objet avec les résultats de la requête
     */
    public function find($id, $append=null) {
        if(is_null($append)) {
            $append = $this->table;
        }
        return $this->query("SELECT * FROM {$this->table} WHERE id". ucfirst($append) ." = ?", [$id], true);
    }
    /**
     * Méthode update() - Exécute une requête SQL mettant à jour une ou plusieurs lignes d'une table dans la base de données, où l'id de la/des ligne(s) est égal à $id
     * @param  integer $id            L'id associé aux lignes à modifier
     * @param  string  [$append=null] Paramètre optionnel - dans le cas où le champ id ne s'appelle pas simplement id (exemple : "idNomDeLaTable") - stocke une string avec le suffixe à utiliser, ou équivaut à null par défaut
     * @param  array                  $fields Tableau associatif avec des clés correspondant aux champs à modifier, contenant les nouvelles valeurs
     * @return object PDOStatement    Retourne soit un objet PDOStatement, soit false
     */
    public function update($id, $append=null, $fields) {
        $sql_parts  = array();
        $attributes = array();
        foreach ($fields as $key => $value) {
            $sql_parts[]  = "$key = ?";
            $attributes[] = $value;
        }
        $attributes[] = $id;
        $sql_set      = implode(', ', $sql_parts);
        return $this->query("UPDATE {$this->table} SET $sql_set WHERE id" . ucfirst($append) . " = ?", $attributes, true);
    }
    /**
     * Méthode delete() - Exécute une requête SQL supprimant une ou plusieurs lignes d'une table dans la base de données, où l'id de la/des ligne(s) est égal à $id
     * @param  integer $id            L'id associé aux lignes à supprimer
     * @param  string  [$append=null] Paramètre optionnel - dans le cas où le champ id ne s'appelle pas simplement id (exemple : "idNomDeLaTable") - stocke une string avec le suffixe à utiliser, ou équivaut à null par défaut
     * @return object PDOStatement    Retourne soit un objet PDOStatement, soit false
     */
    public function delete($id, $append=null) {
        return $this->query("DELETE FROM {$this->table} WHERE id" . ucfirst($append) . " = ?", [$id], true);
    }
    /**
     * Méthode create() -          Exécute une requête SQL ajoutant un ligne dans une table de la base de données
     * @param  array   $fields     Tableau associatif avec des clés correspondant aux champs à remplir dans la nouvelle ligne, contenant les nouvelles valeurs
     * @return object PDOStatement Retourne soit un objet PDOStatement, soit false
     */
    public function create($fields) {
        $sql_parts  = array();
        $attributes = array();
        foreach ($fields as $key => $value) {
            $sql_parts[]  = "$key = ?";
            $attributes[] = $value;
        }
        $sql_set = implode(', ', $sql_parts);
        return $this->query("INSERT INTO {$this->table} SET $sql_set", $attributes, true);
    }
    /**
     * Méthode query() - Interface pour l'objet de classe \Core\Database\Database stocké dans un objet créé à partir de cette classe Table, avec laquelle les autres méthodes de cette classe (constructeur mis à part) interagissent
     * @param  string  $statement           Requête SQL à exécuter
     * @param  array   [$attributes = null] Paramètre optionnel - dans le cas où la requête SQL contient des conditions du type WHERE, LIKE, BETWEEN, etc... mais également dans le cas où la requête modifie la base (requête de type UPDATE, DELETE, INSERT...) - stocke un tableau associatif avec les valeurs nécessaires à la requête, ou équivaut à null par défaut
     * @param  boolean [$one = false]       Paramètre optionnel - pour spécifier (dans le cas d'une requête de type SELECT notamment) si l'on attend un seul résultat en retour (true) ou plusieurs (false, comportement par défaut)
     * @return object  Retourne un objet de classe avec les résultats de la requête
     */
    public function query($statement, $attributes = null, $one = false) {
        if ($attributes) {
            return $this->db->prepare($statement, $attributes, str_replace('Table', 'Entity', get_class($this)), $one);
        } else {
            return $this->db->query($statement, str_replace('Table', 'Entity', get_class($this)), $one);
        }
    }
}

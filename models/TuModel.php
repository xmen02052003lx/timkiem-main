<?php
class TuModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=db_timkiem', 'root', '');
    }

    public function searchWords($keyword) {
        $stmt = $this->db->prepare("SELECT * FROM words WHERE name LIKE :keyword");
        $stmt->bindValue(':keyword', '%' . $keyword . '%', PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addWord($name) {
        $stmt = $this->db->prepare("INSERT INTO words (name) VALUES (:name)");
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->execute();
    }
}
?>

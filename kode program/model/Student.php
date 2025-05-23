<?php
require_once 'config/Database.php';

class Student {
    private $conn;
    private $table = 'students';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        // Join dengan courses untuk menampilkan judul course
        $query = "SELECT s.*, c.title as course_title 
                  FROM " . $this->table . " s
                  LEFT JOIN courses c ON s.course_id = c.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($name, $email, $course_id) {
        $query = "INSERT INTO " . $this->table . " (name, email, course_id) VALUES (:name, :email, :course_id)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':course_id', $course_id);
        return $stmt->execute();
    }

    public function update($id, $name, $email, $course_id) {
        $query = "UPDATE " . $this->table . " 
                  SET name = :name, email = :email, course_id = :course_id 
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':course_id', $course_id);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>

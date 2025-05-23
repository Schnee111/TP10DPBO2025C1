<?php
require_once 'config/Database.php';

class Course {
    private $conn;
    private $table = 'courses';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        // Join dengan instructors untuk menampilkan nama pengajar
        $query = "SELECT c.*, i.name as instructor_name 
                  FROM " . $this->table . " c
                  LEFT JOIN instructors i ON c.instructor_id = i.id";
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

    public function create($title, $description, $duration, $instructor_id) {
        $query = "INSERT INTO " . $this->table . " (title, description, duration, instructor_id) 
                  VALUES (:title, :description, :duration, :instructor_id)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':duration', $duration, PDO::PARAM_INT);
        $stmt->bindParam(':instructor_id', $instructor_id);
        return $stmt->execute();
    }

    public function update($id, $title, $description, $duration, $instructor_id) {
        $query = "UPDATE " . $this->table . " 
                  SET title = :title, description = :description, duration = :duration, instructor_id = :instructor_id 
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':duration', $duration, PDO::PARAM_INT);
        $stmt->bindParam(':instructor_id', $instructor_id);
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

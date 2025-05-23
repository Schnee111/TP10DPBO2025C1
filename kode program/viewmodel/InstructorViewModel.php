<?php
require_once 'model/Instructor.php';

class InstructorViewModel {
    private $instructor;

    public function __construct() {
        $this->instructor = new Instructor();
    }

    public function getInstructorList() {
        return $this->instructor->getAll();
    }

    public function getInstructorById($id) {
        return $this->instructor->getById($id);
    }

    public function addInstructor($name, $email, $specialization) {
        return $this->instructor->create($name, $email, $specialization);
    }

    public function updateInstructor($id, $name, $email, $specialization) {
        return $this->instructor->update($id, $name, $email, $specialization);
    }

    public function deleteInstructor($id) {
        return $this->instructor->delete($id);
    }
}
?>

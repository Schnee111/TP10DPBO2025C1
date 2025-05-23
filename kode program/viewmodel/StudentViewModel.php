<?php
require_once 'model/Student.php';

class StudentViewModel {
    private $student;

    public function __construct() {
        $this->student = new Student();
    }

    public function getStudentList() {
        return $this->student->getAll();
    }

    public function getStudentById($id) {
        return $this->student->getById($id);
    }

    public function addStudent($name, $email, $course_id) {
        return $this->student->create($name, $email, $course_id);
    }

    public function updateStudent($id, $name, $email, $course_id) {
        return $this->student->update($id, $name, $email, $course_id);
    }

    public function deleteStudent($id) {
        return $this->student->delete($id);
    }
}
?>

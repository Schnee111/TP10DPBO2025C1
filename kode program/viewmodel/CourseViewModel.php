<?php
require_once 'model/Course.php';

class CourseViewModel {
    private $course;

    public function __construct() {
        $this->course = new Course();
    }

    public function getCourseList() {
        return $this->course->getAll();
    }

    public function getCourseById($id) {
        return $this->course->getById($id);
    }

    public function addCourse($title, $description, $duration, $instructor_id) {
        return $this->course->create($title, $description, $duration, $instructor_id);
    }

    public function updateCourse($id, $title, $description, $duration, $instructor_id) {
        return $this->course->update($id, $title, $description, $duration, $instructor_id);
    }

    public function deleteCourse($id) {
        return $this->course->delete($id);
    }
}
?>

<?php
require_once 'viewmodel/InstructorViewModel.php';
require_once 'viewmodel/CourseViewModel.php';
require_once 'viewmodel/StudentViewModel.php';

$entity = isset($_GET['entity']) ? $_GET['entity'] : 'instructor';
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

if ($entity == 'instructor') {
    $viewModel = new InstructorViewModel();
    if ($action == 'list') {
        $instructorList = $viewModel->getInstructorList();
        require_once 'views/instructor_list.php';
    } elseif ($action == 'add') {
        require_once 'views/instructor_form.php';
    } elseif ($action == 'edit' && isset($_GET['id'])) {
        $instructor = $viewModel->getInstructorById($_GET['id']);
        require_once 'views/instructor_form.php';
    } elseif ($action == 'save') {
        $viewModel->addInstructor($_POST['name'], $_POST['email'], $_POST['specialization']);
        header('Location: index.php?entity=instructor');
        exit;
    } elseif ($action == 'update' && isset($_GET['id'])) {
        $viewModel->updateInstructor($_GET['id'], $_POST['name'], $_POST['email'], $_POST['specialization']);
        header('Location: index.php?entity=instructor');
        exit;
    } elseif ($action == 'delete' && isset($_GET['id'])) {
        $viewModel->deleteInstructor($_GET['id']);
        header('Location: index.php?entity=instructor');
        exit;
    }
} elseif ($entity == 'course') {
    $viewModel = new CourseViewModel();
    if ($action == 'list') {
        $courseList = $viewModel->getCourseList();
        require_once 'views/course_list.php';
    } elseif ($action == 'add') {
        // perlu data instructors untuk dropdown
        $instructorVM = new InstructorViewModel();
        $instructors = $instructorVM->getInstructorList();
        require_once 'views/course_form.php';
    } elseif ($action == 'edit' && isset($_GET['id'])) {
        $course = $viewModel->getCourseById($_GET['id']);
        $instructorVM = new InstructorViewModel();
        $instructors = $instructorVM->getInstructorList();
        require_once 'views/course_form.php';
    } elseif ($action == 'save') {
        $viewModel->addCourse($_POST['title'], $_POST['description'], $_POST['duration'], $_POST['instructor_id']);
        header('Location: index.php?entity=course');
        exit;
    } elseif ($action == 'update' && isset($_GET['id'])) {
        $viewModel->updateCourse($_GET['id'], $_POST['title'], $_POST['description'], $_POST['duration'], $_POST['instructor_id']);
        header('Location: index.php?entity=course');
        exit;
    } elseif ($action == 'delete' && isset($_GET['id'])) {
        $viewModel->deleteCourse($_GET['id']);
        header('Location: index.php?entity=course');
        exit;
    }
} elseif ($entity == 'student') {
    $viewModel = new StudentViewModel();
    if ($action == 'list') {
        $studentList = $viewModel->getStudentList();
        require_once 'views/student_list.php';
    } elseif ($action == 'add') {
        // perlu data courses untuk dropdown
        $courseVM = new CourseViewModel();
        $courses = $courseVM->getCourseList();
        require_once 'views/student_form.php';
    } elseif ($action == 'edit' && isset($_GET['id'])) {
        $student = $viewModel->getStudentById($_GET['id']);
        $courseVM = new CourseViewModel();
        $courses = $courseVM->getCourseList();
        require_once 'views/student_form.php';
    } elseif ($action == 'save') {
        $viewModel->addStudent($_POST['name'], $_POST['email'], $_POST['course_id']);
        header('Location: index.php?entity=student');
        exit;
    } elseif ($action == 'update' && isset($_GET['id'])) {
        $viewModel->updateStudent($_GET['id'], $_POST['name'], $_POST['email'], $_POST['course_id']);
        header('Location: index.php?entity=student');
        exit;
    } elseif ($action == 'delete' && isset($_GET['id'])) {
        $viewModel->deleteStudent($_GET['id']);
        header('Location: index.php?entity=student');
        exit;
    }
} else {
    // default fallback ke instructor list
    header('Location: index.php?entity=instructor&action=list');
    exit;
}

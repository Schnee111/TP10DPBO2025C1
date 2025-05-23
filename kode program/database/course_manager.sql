-- Drop dan buat ulang database
DROP DATABASE IF EXISTS course_manager;
CREATE DATABASE course_manager;
USE course_manager;

-- Tabel instructors
CREATE TABLE instructors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    specialization VARCHAR(100)
);

INSERT INTO instructors (name, email, specialization) VALUES
('Dina Kusuma', 'dina@example.com', 'Data Science'),
('Rudi Hartono', 'rudi@example.com', 'Web Development'),
('Tina Wijaya', 'tina@example.com', 'UI/UX Design');

-- Tabel courses
CREATE TABLE courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description TEXT,
    duration INT,
    instructor_id INT,
    FOREIGN KEY (instructor_id) REFERENCES instructors(id)
        ON DELETE SET NULL
        ON UPDATE CASCADE
);

INSERT INTO courses (title, description, duration, instructor_id) VALUES
('Intro to Python', 'Belajar dasar-dasar pemrograman Python.', 40, 1),
('Fullstack Web Dev', 'Frontend dan backend menggunakan modern stack.', 60, 2),
('UI/UX Fundamentals', 'Dasar desain pengalaman dan antarmuka pengguna.', 30, 3);

-- Tabel students
CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    course_id INT,
    FOREIGN KEY (course_id) REFERENCES courses(id)
        ON DELETE SET NULL
        ON UPDATE CASCADE
);

INSERT INTO students (name, email, course_id) VALUES
('Andi Setiawan', 'andi@example.com', 1),
('Sari Utami', 'sari@example.com', 2),
('Joko Prabowo', 'joko@example.com', 2),
('Maya Lestari', 'maya@example.com', 3),
('Rio Purnomo', 'rio@example.com', 1);

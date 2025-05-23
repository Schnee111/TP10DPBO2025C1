# TP10DPBO2025C1

## Janji

*Saya, **Muhammad Daffa Ma'arif** dengan NIM **2305771**, mengerjakan **Tugas Praktikum 10** dalam mata kuliah **DPBO** dengan sebaik-baiknya demi keberkahan-Nya.
Saya berjanji tidak melakukan kecurangan sebagaimana yang telah dispesifikasikan. **Aamiin.***

---

## Deskripsi Program

**TP10DPBO2025C1 - course Management** adalah aplikasi berbasis PHP native yang mengimplementasikan pola arsitektur **MVVM (Model-View-ViewModel)** untuk mengelola data student, course, dan instructor.

Aplikasi ini terdiri dari 3 modul utama:

* **course**
* **instructor**
* **student**

---

## Fitur

1. **Manajemen course (CRUD)** – Tambah, edit, hapus, dan lihat data course.
2. **Manajemen instructor (CRUD)** – Tambah, edit, hapus, dan lihat data instructor.
3. **Manajemen student (CRUD)** – Tambah, edit, hapus, dan lihat data student.

---

## Struktur Folder

```
DPBO_MVVM/
│
├── config/
│   └── Database.php                  ← konfigurasi koneksi database
│
├── database/
│   └── course_manager.sql            ← struktur dan data awal database
│
├── model/
│   ├── course.php                    ← model untuk tabel course
│   ├── instructor.php                ← model untuk tabel instructor
│   └── student.php                   ← model untuk tabel student
│
├── viewmodel/
│   ├── CourseViewModel.php           ← penghubung antara Model dan View untuk course
│   ├── InstructorViewModel.php       ← penghubung antara Model dan View untuk instructor
│   └── StudentViewModel.php          ← penghubung antara Model dan View untuk student
│
├── views/
│   ├── template/
│   │   ├── footer.php              
│   │   └── header.php  
│   ├── course_form.php               ← form tambah/edit course
│   ├── course_list.php               ← daftar course
│   ├── student_form.php              ← form tambah/edit student
│   ├── student_list.php              ← daftar student
│   ├── instructor_form.php           ← form tambah/edit instructor
│   └── instructor_list.php           ← daftar instructor
│
└── index.php                         ← routing utama aplikasi
```

---

## Alur Navigasi Halaman

| Halaman                   | Fungsi                                                                            |
| ------------------------- | --------------------------------------------------------------------------------- |
| `index.php?entity=student`  | Menampilkan daftar student dan form tambah/edit student dengan pilihan course            |
| `index.php?entity=course`  | Menampilkan daftar course dan form tambah/edit course dengan pilihan instructor           |
| `index.php?entity=instructor` | Menampilkan daftar instructor, form tambah/edit instructor |

---

## Relasi Tabel MySQL

**Database: `course_manager`**

![image](https://github.com/user-attachments/assets/fd92d1e1-cde0-42e1-ab3e-96c37680df4f)


* `students` (`id`, `name`, `email`, `course_id`)
* `courses` (`id`, `title`, `description`, `duration`, `instructor_id`)
* `instructors` (`id`, `name`, `email`, `specialization`)

Relasi:

* `courses.instructor_id` → `instructors.id` (FK)
* `students.course_id` → `courses.id` (FK)

---

## Komponen Sistem

### Model (`model/`)

* **Course.php**
  Mengelola data course dengan CRUD menggunakan PDO dan prepared statement.

* **Student.php**
  Mengelola data student dengan CRUD menggunakan PDO dan prepared statement.

* **Instructor.php**
  Mengelola data instructor dengan CRUD menggunakan PDO dan prepared statement.

### ViewModel (`viewmodel/`)

* Menghubungkan Model dengan View.
* Menyediakan method CRUD dan data yang diperlukan View.

### Views (`views/`)

* Berisi file form dan list untuk Students, Courses, dan Instructors.
* Sudah mengimplementasikan fitur **data binding** agar form menampilkan data lama saat edit.

---

## Dokumentasi


https://github.com/user-attachments/assets/4a05466e-d285-46dd-80ef-1e5344fb0360


---

## Catatan

* Semua operasi CRUD menggunakan PDO dan prepared statement untuk keamanan.
* Pola MVVM memisahkan logika bisnis (ViewModel) dari tampilan (View) dan data (Model).
* Fitur data binding sudah diterapkan di form untuk kemudahan pengeditan data.

---

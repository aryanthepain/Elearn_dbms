-- Create the database and tables
CREATE DATABASE IF NOT EXISTS lab8_elearn;

USE lab8_elearn;

-- Users: students, instructors, admin
CREATE TABLE
    IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100) UNIQUE NOT NULL,
        password VARCHAR(255) NOT NULL,
        role ENUM ('student', 'instructor', 'admin') NOT NULL,
        registered_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );

-- Courses table
CREATE TABLE
    IF NOT EXISTS courses (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(150) NOT NULL,
        description TEXT,
        instructor_id INT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE = InnoDB;

-- Now create course_content table with proper foreign key constraint
CREATE TABLE
    IF NOT EXISTS course_content (
        id INT AUTO_INCREMENT PRIMARY KEY,
        course_id INT NOT NULL,
        content_type ENUM ('video', 'file', 'exam', 'text') NOT NULL,
        title VARCHAR(150),
        content_link VARCHAR(255),
        content_text TEXT,
        FOREIGN KEY (course_id) REFERENCES courses (id) ON DELETE CASCADE
    );

-- Payments table (simulate payment records)
CREATE TABLE
    IF NOT EXISTS payments (
        id INT AUTO_INCREMENT PRIMARY KEY,
        student_id INT NOT NULL,
        course_id INT NOT NULL,
        amount DECIMAL(10, 2) NOT NULL,
        payment_status ENUM ('Pending', 'Success', 'Failed') DEFAULT 'Pending',
        payment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (student_id) REFERENCES users (id) ON DELETE CASCADE,
        FOREIGN KEY (course_id) REFERENCES courses (id) ON DELETE CASCADE
    );

-- Exam Attempts table
CREATE TABLE
    IF NOT EXISTS exam_attempts (
        id INT AUTO_INCREMENT PRIMARY KEY,
        student_id INT NOT NULL,
        course_id INT NOT NULL,
        score INT NOT NULL,
        attempt INT NOT NULL,
        attempt_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (student_id) REFERENCES users (id) ON DELETE CASCADE,
        FOREIGN KEY (course_id) REFERENCES courses (id) ON DELETE CASCADE
    );

-- Forum Posts table
CREATE TABLE
    IF NOT EXISTS forum_posts (
        id INT AUTO_INCREMENT PRIMARY KEY,
        course_id INT NOT NULL,
        user_id INT,
        content TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (course_id) REFERENCES courses (id) ON DELETE CASCADE,
        FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE SET NULL
    );

-- Announcements table
CREATE TABLE
    IF NOT EXISTS announcements (
        id INT AUTO_INCREMENT PRIMARY KEY,
        course_id INT,
        instructor_id INT,
        title VARCHAR(150),
        message TEXT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (course_id) REFERENCES courses (id) ON DELETE SET NULL,
        FOREIGN KEY (instructor_id) REFERENCES users (id) ON DELETE SET NULL
    );

-- Suggestions table
CREATE TABLE
    IF NOT EXISTS suggestions (
        id INT AUTO_INCREMENT PRIMARY KEY,
        student_id INT,
        suggestion_text TEXT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (student_id) REFERENCES users (id) ON DELETE SET NULL
    );

-- Certificates table
CREATE TABLE
    IF NOT EXISTS certificates (
        id INT AUTO_INCREMENT PRIMARY KEY,
        student_id INT NOT NULL,
        course_id INT NOT NULL,
        issued_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (student_id) REFERENCES users (id) ON DELETE CASCADE,
        FOREIGN KEY (course_id) REFERENCES courses (id) ON DELETE CASCADE
    );

CREATE TABLE
    IF NOT EXISTS exams (
        id INT AUTO_INCREMENT PRIMARY KEY,
        course_id INT NOT NULL,
        question TEXT NOT NULL,
        option_a VARCHAR(255),
        option_b VARCHAR(255),
        option_c VARCHAR(255),
        option_d VARCHAR(255),
        correct_option CHAR(1),
        FOREIGN KEY (course_id) REFERENCES courses (id) ON DELETE CASCADE
    ) ENGINE = InnoDB;
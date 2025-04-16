-- Table to store student registrations
CREATE TABLE
    IF NOT EXISTS student (
        stu_id INT AUTO_INCREMENT PRIMARY KEY,
        stu_name VARCHAR(100) NOT NULL,
        stu_email VARCHAR(100) UNIQUE NOT NULL,
        stu_pass VARCHAR(255) NOT NULL, -- Note: storing hashed passwords is best practice.
        registered_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );

-- Table to store courses offered on the platform
CREATE TABLE
    IF NOT EXISTS courses (
        course_id INT AUTO_INCREMENT PRIMARY KEY,
        course_name VARCHAR(100) NOT NULL,
        course_description TEXT,
        course_price DECIMAL(10, 2) NOT NULL,
        course_discount_price DECIMAL(10, 2),
        course_image VARCHAR(255), -- Image filename or URL for the course thumbnail
        course_duration VARCHAR(50), -- E.g., "10 Days"
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );

-- Table to store lessons for each course (used in coursedetail.php)
CREATE TABLE
    IF NOT EXISTS lessons (
        lesson_id INT AUTO_INCREMENT PRIMARY KEY,
        course_id INT NOT NULL,
        lesson_number INT NOT NULL,
        lesson_title VARCHAR(100) NOT NULL,
        FOREIGN KEY (course_id) REFERENCES courses (course_id) ON DELETE CASCADE
    );

-- Table to track payment details (to be used in paymentstatus.php)
CREATE TABLE
    IF NOT EXISTS payments (
        payment_id INT AUTO_INCREMENT PRIMARY KEY,
        student_id INT NOT NULL,
        course_id INT NOT NULL,
        order_id VARCHAR(100) UNIQUE NOT NULL, -- Unique order identifier
        payment_status VARCHAR(50) NOT NULL, -- E.g., 'Success', 'Pending', 'Failed'
        amount DECIMAL(10, 2) NOT NULL,
        payment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (student_id) REFERENCES student (stu_id) ON DELETE CASCADE,
        FOREIGN KEY (course_id) REFERENCES courses (course_id) ON DELETE CASCADE
    );
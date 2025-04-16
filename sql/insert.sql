USE lab8_elearn;

-- Insert dummy admin user
INSERT INTO
    users (name, email, password, role)
VALUES
    (
        'Admin User',
        'admin@edulearn.com',
        '$2y$10$dummyhashadmin',
        'admin'
    );

-- Insert dummy students
INSERT INTO
    users (name, email, password, role)
VALUES
    (
        'Alice Johnson',
        'alice@example.com',
        '$2y$10$dummyhash1',
        'student'
    ),
    (
        'Bob Smith',
        'bob@example.com',
        '$2y$10$dummyhash2',
        'student'
    );

-- Insert dummy instructors
INSERT INTO
    users (name, email, password, role)
VALUES
    (
        'Dr. John Doe',
        'john.doe@edulearn.com',
        '$2y$10$dummyhash3',
        'instructor'
    ),
    (
        'Prof. Jane Roe',
        'jane.roe@edulearn.com',
        '$2y$10$dummyhash4',
        'instructor'
    );

-- Insert dummy courses
INSERT INTO
    courses (title, description, instructor_id)
VALUES
    (
        'Introduction to Programming',
        'Learn the basics of programming.',
        3
    ),
    (
        'Advanced Web Development',
        'Deep dive into web technologies.',
        4
    );

-- Insert dummy course content (video and exam)
INSERT INTO
    course_content (course_id, content_type, title, content_link)
VALUES
    (
        1,
        'video',
        'Introduction Video',
        'https://www.example.com/video1.mp4'
    ),
    (1, 'exam', 'Midterm Exam', NULL);

-- Insert dummy payment record
INSERT INTO
    payments (student_id, course_id, amount, payment_status)
VALUES
    (1, 1, 99.99, 'Success');

-- Insert dummy exam attempt
INSERT INTO
    exam_attempts (student_id, course_id, score, attempt)
VALUES
    (1, 1, 85, 1),
    (1, 1, 90, 2);

-- Highest score
-- Insert dummy forum post
INSERT INTO
    forum_posts (course_id, user_id, content)
VALUES
    (1, 1, 'Great course, I learned a lot!');

-- Insert dummy announcement
INSERT INTO
    announcements (course_id, instructor_id, title, message)
VALUES
    (
        1,
        3,
        'Welcome to the Course',
        'The course will start on Monday.'
    );

-- Insert dummy suggestion
INSERT INTO
    suggestions (student_id, suggestion_text)
VALUES
    (
        2,
        'I would like to have a course on Data Science.'
    );

-- Insert dummy certificate record
INSERT INTO
    certificates (student_id, course_id)
VALUES
    (1, 1);
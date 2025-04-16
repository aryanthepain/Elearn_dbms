USE lab8_elearn;

-- Query: List all courses with instructors
SELECT
    c.id,
    c.title,
    c.description,
    u.name AS instructor_name
FROM
    courses c
    LEFT JOIN users u ON c.instructor_id = u.id;

-- Query: Get all content for a course
SELECT
    *
FROM
    course_content
WHERE
    course_id = 1;

-- Query: Get the highest exam score for a student in a course
SELECT
    student_id,
    course_id,
    MAX(score) AS highest_score
FROM
    exam_attempts
WHERE
    student_id = 1
    AND course_id = 1;

-- Query: Get all forum posts for a course
SELECT
    fp.content,
    u.name,
    fp.created_at
FROM
    forum_posts fp
    LEFT JOIN users u ON fp.user_id = u.id
WHERE
    fp.course_id = 1
ORDER BY
    fp.created_at DESC;

-- Query: Get all announcements
SELECT
    *
FROM
    announcements
ORDER BY
    created_at DESC;

-- Query: Get all suggestions
SELECT
    s.suggestion_text,
    u.name AS student_name
FROM
    suggestions s
    LEFT JOIN users u ON s.student_id = u.id;

-- Query: Check if a certificate exists for a student & course
SELECT
    *
FROM
    certificates
WHERE
    student_id = 1
    AND course_id = 1;
--Create trigger(s) to make sure each person has to be either an instructor or a student but not both. (Total and disjoint generalization in the ER diagram.)
DELIMITER
CREATE TRIGGER ins_is_not_stu
AFTER UPDATE ON instructor
FOR EACH ROW
BEGIN
        IF new.id IN (SELECT id FROM student) THEN
                DELETE FROM instructor WHERE instructor.id = new.id;
        END IF;
END;
CREATE TRIGGER stu_is_not_ins
AFTER UPDATE ON student
FOR EACH ROW
BEGIN
        IF new.id IN (SELECT id FROM instructor) THEN
                DELETE FROM student WHERE student.id = new.id;
        END IF;
END;
DELIMITER;
--Also create trigger(s) to make sure each person in borrow and contact already exists in either instructor or student but not both.
CREATE TRIGGER check_person_role
BEFORE INSERT OR UPDATE ON person
FOR EACH ROW
BEGIN
    IF NEW.role NOT IN ('instructor', 'student') THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'A person must be either an instructor or a student.';
    END IF;

    IF (NEW.role = 'instructor' AND EXISTS (SELECT 1 FROM person WHERE id = NEW.id AND role = 'student')) OR
       (NEW.role = 'student' AND EXISTS (SELECT 1 FROM person WHERE id = NEW.id AND role = 'instructor')) THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'A person cannot be both an instructor and a student.';
    END IF;
END;

CREATE TRIGGER check_borrow_contact
BEFORE INSERT OR UPDATE ON borrow_contact
FOR EACH ROW
BEGIN
    IF (SELECT COUNT(*) FROM person WHERE id = NEW.person_id AND role = 'instructor') = 0 AND
       (SELECT COUNT(*) FROM person WHERE id = NEW.person_id AND role = 'student') = 0 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Person must exist as either an instructor or a student.';
    END IF;
END;
--A student gains the credits from a course if he/she receives passing grade (not ‘F’) from the course. A student graduates from the college if he/she obtains 130 credits. Create trigger(s) to on enroll to detect the graduates and remove those graduates from the database.
CREATE TRIGGER check_student_graduation
AFTER UPDATE ON enroll
FOR EACH ROW
BEGIN
    DECLARE total_credits INT;

    SELECT SUM(credits) INTO total_credits
    FROM course
    WHERE student_id = NEW.student_id AND grade != 'F';

    IF total_credits >= 130 THEN
        DELETE FROM student WHERE id = NEW.student_id;
    END IF;
END;

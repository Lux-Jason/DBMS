-- Add constraint for grade in enroll table
ALTER TABLE enroll
ADD CONSTRAINT check_grade
CHECK (grade IN ('A', 'A-', 'B+', 'B', 'B-', 'C+', 'C', 'C-', 'D', 'F'));

-- Add constraint for year in student table
ALTER TABLE student
ADD CONSTRAINT check_year
CHECK (yr BETWEEN 1 AND 4);

-- Recreate foreign keys
ALTER TABLE student
ADD CONSTRAINT student_program
FOREIGN KEY (p_code) REFERENCES program(p_code)
ON UPDATE CASCADE;

ALTER TABLE instructor
ADD CONSTRAINT instructor_program
FOREIGN KEY (p_code) REFERENCES program(p_code)
ON UPDATE CASCADE;

ALTER TABLE program
ADD CONSTRAINT program_director
FOREIGN KEY (director_id) REFERENCES instructor(id)
ON UPDATE CASCADE;

ALTER TABLE section
ADD CONSTRAINT section_instructor
FOREIGN KEY (instructor_id) REFERENCES instructor(id)
ON UPDATE CASCADE;

ALTER TABLE section
ADD CONSTRAINT section_course
FOREIGN KEY (c_name) REFERENCES course(c_name)
ON UPDATE CASCADE;

ALTER TABLE enroll
ADD CONSTRAINT enroll_student
FOREIGN KEY (id) REFERENCES student(id)
ON UPDATE CASCADE;

ALTER TABLE enroll
ADD CONSTRAINT enroll_section
FOREIGN KEY (c_name, s_number, sem) REFERENCES section(c_name, s_number, sem)
ON UPDATE CASCADE;

ALTER TABLE offer
ADD CONSTRAINT offer_program
FOREIGN KEY (p_code) REFERENCES program(p_code)
ON UPDATE CASCADE;

ALTER TABLE offer
ADD CONSTRAINT offer_course
FOREIGN KEY (c_name) REFERENCES course(c_name)
ON UPDATE CASCADE;

ALTER TABLE borrow
ADD CONSTRAINT borrow_book
FOREIGN KEY (ISBN) REFERENCES book(ISBN)
ON UPDATE CASCADE;

-- Note: We're not adding a foreign key for borrow.id as per the requirement
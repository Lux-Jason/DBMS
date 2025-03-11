CREATE DATABASE uic_example

CREATE TABLE uic_example.borrow(
				id			INT 	NOT NULL,
				ISBN			INT	NOT NULL,
				return_date	DATE,
				borrow_date	DATE	NOT NULL,
				PRIMARY KEY (id, ISBN)
			);

CREATE TABLE uic_example.programs(
    p_code      INT,
    p_name      VARCHAR(40)     NOT NULL,
    division        VARCHAR(40),
    director_id     INT,
    PRIMARY KEY(p_code)
);

CREATE TABLE uic_example.course(
    c_name      VARCHAR(40),
    credits     INT     NOT NULL,
    domain      VARCHAR(4)      NOT NULL,
    c_number        INT     NOT NULL,
    PRIMARY KEY(c_name)
);

CREATE TABLE uic_example.offer(
    p_code      INT,
    c_name      VARCHAR(40),
    PRIMARY KEY(p_code, c_name)
);

CREATE TABLE uic_example.enroll (
    id              INT NOT NULL,
    c_name          VARCHAR(40) NOT NULL,
    s_number        INT NOT NULL,
    sem             VARCHAR(10) NOT NULL,
    grade           CHAR(2),
    PRIMARY KEY (id, c_name, s_number, sem),
    FOREIGN KEY (id) REFERENCES uic_example.students(id),
    FOREIGN KEY (c_name, s_number, sem) REFERENCES uic_example.section(c_name, s_number, sem)
);


CREATE TABLE uic_example.section (
    c_name          VARCHAR(40) NOT NULL,
    s_number        INT NOT NULL,
    sem             VARCHAR(10) NOT NULL,
    venue           VARCHAR(50),
    time            TIME,
    instructor_id   INT,
    PRIMARY KEY (c_name, s_number, sem),
    FOREIGN KEY (c_name) REFERENCES uic_example.course(c_name),
    FOREIGN KEY (instructor_id) REFERENCES uic_example.instructors(id)
);

CREATE TABLE uic_example.students (
    id              INT,
    s_name          VARCHAR(50) NOT NULL,
    year            INT,
    gpa             DECIMAL(3, 2),
    major           VARCHAR(50),
    PRIMARY KEY(id)
);

CREATE TABLE uic_example.instructors (
    id              INT PRIMARY KEY,
    i_name          VARCHAR(50) NOT NULL,
    title           VARCHAR(30),
    salary          DECIMAL(10, 2),
    program         INT
    
);

CREATE TABLE uic_example.contact (
    id              INT PRIMARY KEY,
    phone           VARCHAR(15),
    FOREIGN KEY (id) REFERENCES uic_example.students(id)
);

CREATE TABLE uic_example.books (
    ISBN            INT PRIMARY KEY,
    b_title         VARCHAR(100) NOT NULL,
    author          VARCHAR(50)
);



ALTER TABLE uic_example.offer ADD FOREIGN KEY(p_code) REFERENCES uic_example.programs(p_code);
ALTER TABLE uic_example.offer ADD FOREIGN KEY(c_name) REFERENCES uic_example.course(c_name);
ALTER TABLE uic_example.programs ADD FOREIGN KEY(director_id) REFERENCES uic_example.instructors(id);
ALTER Table uic_example.borrow ADD FOREIGN KEY(ISBN) REFERENCES uic_example.books(ISBN);
ALTER Table uic_example.borrow ADD FOREIGN KEY(id) REFERENCES uic_example.students(id)

ALTER Table uic_example.instructors ADD FOREIGN KEY (program) REFERENCES uic_example.programs(p_code)
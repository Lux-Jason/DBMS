-- Insert into Program table
INSERT INTO program (p_code, p_name, division, director_id) VALUES
(1001, 'Computer Science', 'Science and Technology', 20005),
(1002, 'Environmental Science', 'Science and Technology', 20002),
(1003, 'Statistic', 'Science and Technology', 20003),
(1004, 'Media Arts and Design', 'Culture and Creativity', 20007);

-- Insert into Instructor table
INSERT INTO instructor (id, i_name, title, salary, p_code) VALUES
(20002, 'S.H. Zee', 'Professor', 100000, 1002),
(20003, 'Eva', 'Professor', 80000, 1003),
(20004, 'Howard', 'Lecturer', 20000, 1003),
(20005, 'Stephen', 'Associate Professor', 60000, 1001),
(20006, 'Paul', 'Lecturer', 10000, 1004),
(20007, 'Kevin', 'Professor', 80000, 1004);

-- Insert into Course table
INSERT INTO course (c_name, credits, domain, c_number) VALUES
('Introduction to Biology', 3, 'ENVS', 2001),
('Software Development Workshop', 1, 'COMP', 3023),
('Foundations of C Programming', 3, 'GCIT', 1013),
('Advanced Statistics', 3, 'STAT', 2003),
('Photography', 3, 'MAD', 3003);

-- Insert into Offer table
INSERT INTO offer (p_code, c_name) VALUES
(1001, 'Software Development Workshop'),
(1001, 'Foundations of C Programming'),
(1002, 'Introduction to Biology'),
(1003, 'Advanced Statistics'),
(1004, 'Photography');

-- Insert into Section table
INSERT INTO section (c_name, s_number, sem, venue, s_time, instructor_id) VALUES
('Introduction to Biology', 1001, '16F', 'C-303', 'Mon. 13:00-16:00', 20002),
('Software Development Workshop', 1001, '17S', 'D-102', 'Tue. 9:00-12:00', 20005),
('Foundations of C Programming', 1001, '17S', 'D-403', 'Tue. 14:00-17:00', 20005),
('Foundations of C Programming', 1002, '17S', 'D-402', 'Wed. 9:00-12:00', 20003),
('Advanced Statistics', 1001, '16F', 'B-302', 'Thu. 13:00-16:00', 20004),
('Photography', 1001, '16F', 'E-102', 'Fri. 13:00-16:00', 20006),
('Photography', 1001, '17F', 'E-104', 'Fri. 9:00-12:00', 20007);

-- Insert into Student table
INSERT INTO student (id, s_name, yr, gpa, p_code) VALUES
(30001, 'Alice', 3, 3.54, 1003),
(30002, 'Bob', 2, 1.36, 1002),
(30003, 'Charlie', 4, 3.14, 1004),
(30004, 'Dave', 2, 3.25, 1001),
(30005, 'Elfrid', 1, 2.94, 1003),
(30006, 'Frank', 1, 3.08, 1004),
(30007, 'Goppa', 2, 3.61, 1001),
(30008, 'Hynuza', 3, 3.72, 1002);

-- Insert into Enroll table
INSERT INTO enroll (id, c_name, s_number, sem, grade) VALUES
(30001, 'Advanced Statistics', 1001, '16F', 'A-'),
(30001, 'Foundations of C Programming', 1002, '17S', 'A-'),
(30002, 'Introduction to Biology', 1001, '16F', 'F'),
(30003, 'Photography', 1001, '16F', 'B+'),
(30004, 'Software Development Workshop', 1001, '17S', 'A-'),
(30005, 'Foundations of C Programming', 1001, '17S', 'C+'),
(30006, 'Photography', 1001, '17F', 'B'),
(30007, 'Foundations of C Programming', 1001, '17S', 'A'),
(30008, 'Introduction to Biology', 1001, '16F', 'A-');

-- Insert into Book table
INSERT INTO book (ISBN, b_title, author) VALUES
('9781579550088', 'A New Kind of Science', 'Stephen Wolfram'),
('9780923891579', 'Introduction to Metamathematics', 'Stephen Cole Kleene');

-- Insert into Borrow table
INSERT INTO borrow (id, ISBN, return_date, borrow_date) VALUES
(30001, '9781579550088', '2016-03-24', '2016-03-01'),
(30002, '9781579550088', '2015-10-08', '2015-09-25'),
(30003, '9780923891579', '2014-11-12', '2014-11-22'),
(20004, '9781579550088', '2013-06-02', '2013-09-02');

-- Insert into Contact table
INSERT INTO contact (id, phone) VALUES
(20002, 13123456789),
(20003, 13165498742),
(20004, 13124521698),
(20005, 13147821652),
(20006, 13152486123),
(20007, 13152168426),
(30001, 13548562132),
(30002, 13521654897),
(30003, 13526489762),
(30004, 13524879653),
(30005, 13564892136),
(30006, 13546892131),
(30007, 13516498554),
(30008, 13579652321);
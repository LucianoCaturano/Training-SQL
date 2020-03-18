SELECT * FROM students;

SELECT prenom FROM students;

SELECT prenom,datenaissance,school FROM students;

SELECT * FROM students WHERE genre = "F";

SELECT * FROM students WHERE school = "Addy";

SELECT prenom FROM students ORDER BY prenom DESC;

SELECT prenom FROM students ORDER BY prenom DESC LIMIT 2;

INSERT INTO students (nom,prenom,datenaissance,genre,school) VALUES ('Dalor','Ginette','1930-01-01','F','1');

UPDATE students SET idStudent=31,prenom = 'Omer' ,genre='M' WHERE idStudent=33;

DELETE FROM students WHERE idStudent=3;

ALTER TABLE students MODIFY school varchar(50);
UPDATE students SET school='Central' WHERE school = 1;
UPDATE students SET school='Anderlecht' WHERE school = '2';
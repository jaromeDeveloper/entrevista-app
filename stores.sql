
-- Listado de materias No seleccionadas
DROP PROCEDURE sp_list_except_assign_qry;
DELIMITER //
CREATE PROCEDURE sp_list_except_assign_qry(
    IN pid INT(11)
)
BEGIN
	
	SELECT lessons.id
    FROM lessons
    WHERE lessons.id NOT IN
    ( 
        SELECT students_lessons.lesson_id 
    	FROM students
    	INNER JOIN students_lessons ON students_lessons.student_id = students.id
    	WHERE students.id = pid
    );
    
END//


-- Listado de materias ya seleccionadas
DROP PROCEDURE sp_list_assigned;
DELIMITER //
CREATE PROCEDURE sp_list_assigned(
    IN pid INT(11)
)
BEGIN
	

        SELECT students_lessons.lesson_id 
    	FROM students
    	INNER JOIN students_lessons ON students_lessons.student_id = students.id
    	WHERE students.id = pid

END//

DELIMITER $$
-- listado para asignar materias
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_list_assigned`(IN `pid` INT(11))
BEGIN
	

        SELECT students_lessons.lesson_id, lessons.name 
    	FROM students
    	INNER JOIN students_lessons ON students_lessons.student_id = students.id
INNER JOIN lessons ON lessons.id = students_lessons.lesson_id
WHERE students.id = pid;

END$$
DELIMITER ;

DELIMITER $$
-- listado donde muestra las materias asignadas
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_list_except_assign_qry`(
    IN pid INT(11)
)
BEGIN
	
	SELECT lessons.id, lessons.name
    FROM lessons
    WHERE lessons.id NOT IN
    ( 
        SELECT students_lessons.lesson_id 
    	FROM students
    	INNER JOIN students_lessons ON students_lessons.student_id = students.id
    	WHERE students.id = pid
    );
    
END$$
DELIMITER ;

DELIMITER $$
-- Nueva relación de lessiones - estudiante 
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_save_relationship_lessons_qry`(
	IN pid INT(11),
    IN plesson INT(11)
)
BEGIN
	INSERT INTO students_lessons(lesson_id, student_id, created_at, updated_at) VALUES (plesson, pid, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
	SELECT LAST_INSERT_ID() INTO @id;
    IF(@id > 0) THEN
    	SELECT 'Se inserto correctamente' AS 'Mensaje'; 
    ELSE
    	SELECT 'Se genero un error' AS 'Mensaje'; 
    END IF;
END$$
DELIMITER ;

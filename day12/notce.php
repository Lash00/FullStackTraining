CREATE VIEW Students_Courses As
SELECT s.name,COUNT(s.id) FROM enrolles e
LEFT JOIN students s on s.id=e.student_id
GROUP BY(e.student_id)

--> its an way to create an view in data base without make an table so by that u will save the storeg
and will not longer need to wright the same query every time u get the data

--> why save the storage ? beaucose u will save the query not the data its will be for view only
and the View will Updated automaticly



less-->
CREATE VIEW Less_Cours As
SELECT name FROM students WHERE id=( SELECT student_id FROM enrolles e JOIN students s ON s.id = e.student_id
GROUP BY(s.id) ORDER BY COUNT(s.id) ASC LIMIT 1 )


cours std-->

CREATE VIEW Course_atend As
SELECT c.title , COUNT(c.id) As students_Number FROM enrolles e
LEFT JOIN coursdata c ON c.id=e.course_id
GROUP BY(e.course_id)


av-->

CREATE VIEW Avilb_std As
SELECT name FROM students WHERE id NOT IN (SELECT student_id FROM enrolles)
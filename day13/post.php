<?php
header("Content-Type:application/json");
header("Access-Control-Allow-Origin: *");
require_once("./DB.php");

class Post
{

    use Db;
    public function __construct(public $tableName)
    {
    }

    function InsertIntoStudents($name, $email, $phone, $date)
    {

        $data = $this->con->prepare("SELECT email FROM student WHERE email=?");
        $data->bind_param("s", $email);
        $data->execute();
        $res = $data->get_result();

        if ($res->num_rows > 0) {
            echo json_encode([
                "success" => false,
                "message" => "User Already Exsits "
            ]);
            return;
        } else {
            $stm = $this->con->prepare("INSERT INTO students VALUES ('',?,?,?,?)");
            $stm->bind_param("ssss", $name, $email, $phone, $date);
            $stm->execute();
            if ($stm->affected_rows > 0) {
                echo json_encode([
                    "success" => true,
                    "message" => "Student have been add successFuly "
                ]);
            } else {

                echo json_encode([
                    "success" => false,
                    "message" => "Try again later "
                ]);
            }
            $stm->close();
        }
    }

    function InsertIntoCoursData($title, $description, $hours, $price)
    {

        $data = $this->con->prepare("SELECT title FROM coursData WHERE title=?");
        $data->bind_param("s", $title);
        $data->execute();
        $res = $data->get_result();

        if ($res->num_rows > 0) {
            echo json_encode([
                "success" => false,
                "message" => "Course Already Exsits "
            ]);
            return;
        } else {
            $stm = $this->con->prepare("INSERT INTO coursData VALUES ('',?,?,?,?)");
            $stm->bind_param("ssdd", $title, $description, $hours, $price);
            $stm->execute();
            if ($stm->affected_rows > 0) {
                echo json_encode([
                    "success" => true,
                    "message" => "Course have been add successFuly "
                ]);
            } else {

                echo json_encode([
                    "success" => false,
                    "message" => "Try again later "
                ]);
            }
            $stm->close();
        }


    }


    function InsertIntoEnrolles($student_id, $course_id, $degree)
    {

        $data = $this->con->prepare("SELECT * FROM enrolles WHERE student_id=? and course_id=?");
        $data->bind_param("ii", $student_id, $course_id);
        $data->execute();
        $res = $data->get_result();

        if ($res->num_rows > 0) {
            echo json_encode([
                "success" => false,
                "message" => "Student Already Enrolled this Course "
            ]);
            return;
        } else {
            $stm = $this->con->prepare("INSERT INTO enrolles VALUES ('',?,?,?)");
            $stm->bind_param("iis", $student_id, $course_id, $degree);
            $stm->execute();
            if ($stm->affected_rows > 0) {
                echo json_encode([
                    "success" => true,
                    "message" => "Enrolles Done Successfuly "
                ]);
            } else {

                echo json_encode([
                    "success" => false,
                    "message" => "Try again later "
                ]);
            }
            $stm->close();
        }


    }

}
$tableName = 'courseData';
$data = json_decode(file_get_contents("php://input"), true);
$post = new Post($tableName);
$post->setConnestion();
$title = $data["title"];
$desc = $data["desc"];
$hours = $data["hours"];
$price = $data["price"];
$post->InsertIntoCoursData($title, $desc, $hours, $price);


?>
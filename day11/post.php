<?php
header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);

class Student
{
    public function __construct(public $name, public $email, private $isActive = false)
    {
    }

    public function activate()
    {
        $this->isActive ? false : true;
    }

    public function getStatus()
    {
        return $this->isActive ? "Active" : "Inactive";
    }

    public function toJson()
    {
        if ($this->isActive) {

            return json_encode([
                "name" => $this->name,
                "email" => $this->email,
                "status" => $this->getStatus()
            ]);
        } else {
            return json_encode([
                "status" => 'Inactive',
                "message" => 'Wrong Email Or pass'
            ]);
        }
    }
}
$student = new Student($data['name'], $data['email']);
$student->activate();
echo $student->toJson();


?>
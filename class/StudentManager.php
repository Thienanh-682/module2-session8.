<?php


class StudentManager
{
    public $studentDB;

    public function __construct()
    {
        $db = new DBConnect("mysql:host=localhost;dbname=my_databases", "root", "thieanh01");
        $this->studentDB = $db->connect();
    }

    function getAll()
    {
        $sql = "SELECT * FROM students";
        $stmt = $this->studentDB->query($sql);
        $result = $stmt->fetchAll();
        $students = [];
        foreach ($result as $value) {
            $student = new Student($value['name'], $value['phone']);
            $student->id = $value['id'];
            array_push($students, $student);
        }
        return $students;
    }

    function insert($student)
    {
        $stmt = $this->studentDB->prepare('INSERT INTO students(name, phone) VALUES (:name , :phone)');
        $stmt->bindParam(':name', $student->name);
        $stmt->bindParam(':phone', $student->phone);
        $stmt->execute();
    }

    function delete($id)
    {
        $stmt = $this->studentDB->prepare('DELETE FROM students WHERE id=:id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    function findStudentById($id)
    {
        $stmt = $this->studentDB->prepare('SELECT phone,name FROM `students` WHERE id=:id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    function update($id, $student)
    {
        $stmt = $this->studentDB->prepare('UPDATE students SET name=:name,phone=:phone WHERE id=:id');
        $stmt->bindParam(':name', $student->name);
        $stmt->bindParam(':phone', $student->phone);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}
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
        $sql = "SELECT*FROM staffs";
        $stmt = $this->studentDB->query($sql);
        $result = $stmt->fetchAll();
        $staffs = [];
        foreach ($result as $value) {
            $student = new Student($value['name'], $value['phone']);
            $student->id = $value['id'];
            array_push($staffs, $student);
        }
        return $staffs;
    }

    function insert($student)
    {
        $stmt = $this->studentDB->prepare('INSERT INTO staffs(name,phone) VALUES (:name , :phone)');
        $stmt->bindParam(':name', $student->name);
        $stmt->bindParam(':phone', $student->phone);
        $stmt->execute();
    }

    function delete($index)
    {
        $stmt = $this->studentDB->prepare('DELETE FROM staffs WHERE id=:id');
        $stmt->bindParam(':id', $index);
        $stmt->execute();
    }

    function showEdit($index)
    {
        $stmt = $this->studentDB->prepare('SELECT phone,name FROM `staffs` WHERE id=:id');
        $stmt->bindParam(':id', $index);
        $stmt->execute();
        return $stmt->fetch();
    }

    function update($index, $name, $phone)
    {
        $stmt = $this->studentDB->prepare('UPDATE staffs SET name=:name , phone=:phone WHERE id=:id');
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':id', $index);
        $stmt->execute();
    }
}
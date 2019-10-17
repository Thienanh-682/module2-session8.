<?php


class Student
{
    public $id;
    public $name;
    public $phone;
    public $image;

    public function __construct($name,$phone,$image)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->image = $image;
    }
}
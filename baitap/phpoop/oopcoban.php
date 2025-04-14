<?php

echo 'OOP trong php<br>';

// class Nguoi {
//     private $ten;
//     public function setTen($ten) {
//         $this->ten = $ten;
//     }
//     public function getTen() {
//         return $this->ten;
//     }
// }

// $nguoi = new Nguoi();
// $nguoi->setTen('Han');
// echo 'Xin chao '. $nguoi->getTen() .'<br>';

class Student {
    private $name, $age, $gender, $gpa;

    public function __construct($name, $age, $gender, $gpa) 
    {
        $this->name = $name;
        $this->age = $age;
        $this->gender = $gender;
        $this->gpa = $gpa;
    }

    public function info() {
        echo "Ten: ". $this->name ."<br>";
        echo "Tuoi: ". $this->age ."<br>";
        echo "Gioi tinh: ". $this->gender ."<br>";
        echo "GPA: ". $this->gpa ."<br>";
    }
}

$sv1 = new Student('Pitou Code', 21, 'Nam', 3.6);
$sv1->info();
echo "--------------------------------<br>";

class Staff {
    protected $id, $name, $email, $age, $position;

    public function __construct($id, $name, $email, $age, $position)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->age = $age;
        $this->position = $position;
    }

    public function infor() {
        echo 'Thong tin nhan vien: <br>';
        echo "ID: {$this->id}<br>";
        echo "Name: {$this->name}<br>";
        echo "Email: {$this->email}<br>";
        echo "Age: {$this->age}<br>";
        echo "Position: {$this->position}<br>";
    }
}

class Manager extends Staff {
    private $salary;

    public function __construct($id, $name, $email, $age, $position, $salary)
    {
        parent::__construct($id, $name, $email, $age, $position);
        $this->salary = $salary;
    }

    public function infor()
    {
        parent::infor();
        echo "Salary: {$this->salary}<br>";
    }
}

$st1 = new Manager('nv001', 'William Flowers', 'kurdavku@wimsi.nf', 32, 'Manager', 23000);
$st1->infor();

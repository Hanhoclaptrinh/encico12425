<!-- Bài 2: Quản lý Nhân viên
Yêu cầu:

Tạo class Employee với: id, name, email, salary

Viết phương thức display() để in thông tin nhân viên

Mở rộng:

Tạo class FullTimeEmployee và PartTimeEmployee kế thừa Employee

FullTimeEmployee có bonus, PartTimeEmployee có workingHours

Ghi đè phương thức display() tương ứng -->

<?php

echo "Quản lý nhân viên<br>";

class Employee {
    protected $id, $name, $email, $salary;

    public function __construct($id, $name, $email, $salary)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->salary = $salary;        
    }

    public function display() {
        echo "ID: {$this->id}<br>";
        echo "Tên: {$this->name}<br>";
        echo "Email: {$this->email}<br>";
        echo "Lương cơ bản: {$this->salary}<br>";
    }    
}

class FullTimeEmployee extends Employee {
    private $bonus;

    public function __construct($id, $name, $email, $salary, $bonus)
    {
        parent::__construct($id, $name, $email, $salary);
        $this->bonus = $bonus;        
    }

    public function display()
    {
        parent::display();
        echo "Thưởng: {$this->bonus}<br>";
    }
}

class PartTimeEmployee extends Employee {
    private $workingHours;

    public function __construct($id, $name, $email, $salary, $workingHours)
    {
        parent::__construct($id, $name, $email, $salary);
        $this->workingHours = $workingHours;        
    }

    public function display()
    {
        parent::display();
        echo "Số giờ làm việc: {$this->workingHours}<br>";
    }
}

$nv1 = new FullTimeEmployee("FT01", "Nguyễn Văn A", "a@gmail.com", 5000, 1000);
$nv2 = new PartTimeEmployee("PT01", "Trần Thị B", "b@gmail.com", 100, 40);

$nv1->display();
echo "<hr>";
$nv2->display();

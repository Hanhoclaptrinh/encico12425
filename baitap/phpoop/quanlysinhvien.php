<!-- Bài 3: Quản lý Sinh viên và điểm
Yêu cầu:

Class Student: id, name, scores (mảng điểm)

Hàm getAverage() tính điểm trung bình

Hàm getRank() trả về xếp loại: Giỏi, Khá, Trung bình, Yếu -->

<?php

echo "Quản lý sinh viên và xếp loại<br>";

class Student {
    private $id, $name, $scores;

    public function __construct($id, $name, $scores)
    {
        $this->id = $id;
        $this->name = $name;
        $this->scores = $scores;
    }

    public function getAverage() {
        return count($this->scores) > 0 ? array_sum($this->scores) / count($this->scores) : 0;
    }

    public function getRank() {
        $avg = ($this->getAverage() >= 0 && $this->getAverage() <= 10) ? 
                (($this->getAverage() >= 8.5) ? "Gioi qua bro" : 
                    (($this->getAverage() >= 7 && $this->getAverage() < 8.5) ? "Kha bro" : 
                        (($this->getAverage() >= 5 && $this->getAverage() < 7) ? "Trung binh bro" : 
                            "Yeu qua bro"))) : 
                                "Diem khong hop le! Vui long nhap diem trong khoang (0 - 10)";
        return $avg;
    }

    public function display() {
        echo "ID: {$this->id}<br>";
        echo "Tên: {$this->name}<br>";
        echo "Điểm TB: " . round($this->getAverage(), 2) . "<br>";
        echo "Xếp loại: " . $this->getRank() . "<br>";
    }    
}

$sv1 = new Student("SV01", "Nguyễn Văn A", [8, 9, 10]);
$sv2 = new Student("SV02", "Trần Thị B", [6, 6.5, 7]);
$sv3 = new Student("SV03", "Lê Văn C", [3, 4, 5]);

$sv1->display();
echo "<hr>";
$sv2->display();
echo "<hr>";
$sv3->display();

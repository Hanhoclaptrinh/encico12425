<?php
echo "Cau lenh dieu kien trong php<br>";

// $age = -14;
// if ($age > 0) {
//     if ($age < 18) {
//         echo "Bro qua nho tuoi<br>";
//     } else if ($age >= 18 && $age < 80) {
//         echo "Bro du tuoi roi<br>";
//     } else {
//         echo "Bro qua gia<br>";
//     }
// } else {
//     echo "Tuoi khong duoc la so am bro oi<br>";
// }

$age = 32;
$income = 45000000;
$bonus = 18000000;

$hasJob = true;
$taxStatus = true;
$tax = 0;
$total = 0;

if ($age >= 18 && $hasJob) {
    if ($income >= 3000000 && $income <= 5000000) {
        $tax = $income * 0.05;
    } elseif ($income > 5000000 && $income <= 10000000) {
        $tax = 240000 + ($income - 5000000) * 0.1;
    } elseif ($income > 10000000 && $income <= 18000000) {
        $tax = 750000 + ($income - 10000000) * 0.15;
    } elseif ($income > 18000000 && $income <= 32000000) {
        $tax = 1950000 + ($income - 18000000) * 0.2;
    } elseif ($income > 32000000 && $income <= 52000000) {
        $tax = 4750000 + ($income - 32000000) * 0.25;
    } elseif ($income > 52000000 && $income <= 80000000) {
        $tax = 9750000 + ($income - 52000000) * 0.3;
    } elseif ($income > 80000000) {
        $tax = 18150000 + ($income - 80000000) * 0.35;
    }

    $total = $income - $tax + $bonus;
    echo "Thu nhập sau thuế của bạn là: " . number_format($total) . " VND<br>";
} else {
    echo "Bạn phải đủ 18 tuổi và có công việc để tính thuế.<br>";
}

# toan tu ba ngoi
$gpa = 8.5;
$xepLoai = ($gpa >= 0 && $gpa <= 10) ? 
                (($gpa >= 8.5) ? "Gioi qua bro" : 
                    (($gpa >= 7 && $gpa < 8.5) ? "Kha bro" : 
                        (($gpa >= 5 && $gpa < 7) ? "Trung binh bro" : 
                            "Yeu qua bro"))) : 
                                "Diem khong hop le! Vui long nhap diem trong khoang (0 - 10)";
echo "Xep loai cho bro: " . $xepLoai;

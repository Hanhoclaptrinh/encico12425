<?php
define('PI', pi());
$radius = 10;

echo "Cac ham toan hoc trong php<br>";

echo "Gia tri tuyet doi: ". abs(-423) ."<br>";
echo "Lam tron len: ". ceil(5.12) ."<br>";
echo "Lam tron xuong: ". floor(5.98) ."<br>";
echo "Lam tron theo chu so thap phan: ". round(3.1415926535, 2) ."<br>";
echo "Luy thua: ". pow(5, 3) ."<br>";
echo "Can bac hai: ". sqrt(81) ."<br>";
echo "So lon nhat: ". max(1, 2, 4, 8, 3, 5) ."<br>";
echo "So nho nhat: ". min(1, 2, 4, 8, 3, 5) ."<br>";
echo "So ngau nhien: ". rand() ."<br>";
echo "So ngau nhien co gioi han trong khoang nhat dinh: ". rand(1, 10) ."<br>";
echo "So ngau nhien co gioi han trong khoang nhat dinh (mt_rand - nhanh hon rand): ". mt_rand(1, 10) ."<br>";
echo "Kiem tra mot so co phai NaN khong: ". is_nan(acos(2)) ."<br>";
echo "Kiem tra mot so co phai huu han khong: ". is_finite(pi()) ."<br>";
echo "Kiem tra mot so co phai la so vo cuc khong: ". is_infinite(log(0)) ."<br>";

echo "Dien tich hinh tron co ban kinh $radius: ". PI * pow($radius, 2) ."<br>"; 

echo "Kiem tra so nguyen: ". is_int(234) ."<br>";
echo "Kiem tra so thuc: ". is_float(53.23) ."<br>";
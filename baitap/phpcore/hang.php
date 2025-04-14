<?php
echo "Hang trong php<br>";

# dung define de dinh nghia hang
define('USERNAME', 'PITOU CODE');
define('AGE', 22);
define('GRADE', 'S25-64CNTT');
define('CAR_BRAND', 'Audi');

# dung const de dinh nghia hang
const GPA = 3.8;

# hien thi gia tri cua hang ban echo
echo "USERNAME: ". USERNAME ."<br>";
echo "AGE: ". AGE ."<br>";
echo "GRADE: ". GRADE ."<br>";
echo "GPA: ". GPA ."<br>";

# hien thi gia tri cua hang bang constant (chi hoat dong voi hang duoc khai bao bang define)
echo "CAR_BRAND: ". constant('CAR_BRAND');
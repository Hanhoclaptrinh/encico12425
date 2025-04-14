<?php
echo "Mang trong php<br>";

// $hocVi = array('tu tai', 'cu nhan', 'bac si', 'ki su', 'thac si', 'tien si');
// $viTri = ['cong nhan', 'quan ly', 'ky su', 'giam doc', 'nhan vien', 'ke toan'];

// echo "Vi tri cua phan tu: ". array_search('ki su', $hocVi) ."<br>";

// echo "Hoc vi: ";
// foreach ($hocVi as $hv) {
//     echo $hv ." ";
// }
// echo "<br>";
// echo "Vi tri cong ty: ";
// foreach ($viTri as $vt) {
//     echo $vt ." ";
// }
// echo "<br>";

// $mangSoNguyen = [];
// for ($i = 0; $i < 10; $i++) {
//     array_push($mangSoNguyen, mt_rand(1, 100));
// }
// echo "Mang so nguyen ngau nhien: ";
// foreach ($mangSoNguyen as $msn) {
//     echo $msn ." ";
// }
// echo "<br>";
// sort($mangSoNguyen);
// echo "Mang so nguyen ngau nhien sau khi sap xep: ";
// foreach ($mangSoNguyen as $msn) {
//     echo $msn ." ";
// }
// echo "<br>";

// $mangSoNguyen1 = [412, 643, 1233, 567, 3, 98, 34];
// echo "So phan tu trong mang: ". count($mangSoNguyen1) ."<br>";
// echo "Kich thuoc mang (giong count): ". sizeof($mangSoNguyen1) ."<br>";
// echo "Kiem tra gia tri co ton tai trong mang khong: ". in_array(1233, $mangSoNguyen1) ."<br>";
// echo "Mang so nguyen: <br>";
// foreach ($mangSoNguyen1 as $msn) {
//     echo $msn ." ";
// }
// echo "<br>";
// $mangSoNguyen1 = array_reverse($mangSoNguyen1);
// echo "Mang so nguyen dao nguoc: <br>";
// foreach ($mangSoNguyen1 as $msn) {
//     echo $msn ." ";
// }
// echo "<br>";
// sort($mangSoNguyen1); // sap xep mang tang dan
// echo "Mang so nguyen sap xep tang dan: <br>";
// foreach ($mangSoNguyen1 as $msn) {
//     echo $msn ." ";
// }
// echo "<br>";
// rsort($mangSoNguyen1); // sap xep mang giam dan
// echo "Mang so nguyen sap xep giam dan: <br>";
// foreach ($mangSoNguyen1 as $msn) {
//     echo $msn ." ";
// }
// echo "<br>";

// $mang1 = [1, 2, 3];
// $mang2 = [5, 6, 7];
// $mang3 = array_merge($mang1, $mang2);
// echo "Mang 3 sau khi gop 2 mang 1 va 2: <br>";
// foreach ($mang3 as $m3) {
//     echo $m3 ."<br>";
// }

# chuyen mang thanh chuoi (implode)
// $mang4 = ['bmw', 'volvo', 'mercedes', 'audi', 'ford'];
// $carBrand = implode(', ', $mang4);
// echo $carBrand ."<br>";

# chuyen chuoi thanh mang (explode)
// $username = 'L E V I N H H A N';
// $mang5 = explode(', ', $username);
// foreach($mang5 as $name) {
//     echo $name ."<br>";
// }

# gia tri lon nhat va nho nhat trong mang
// $mang6 = [34, 634, 87, 2, 68, 12];
// echo max($mang6); // 634
// echo min($mang6); // 2
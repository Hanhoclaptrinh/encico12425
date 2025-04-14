<?php
echo 'Chuoi trong php<br>';

$ten = 'Le vinh han';
$lop = "S25-64CNTT";

echo "Do dai cua chuoi '$ten': ". strlen($ten) ."<br>";
echo "Dem so tu trong chuoi '$ten': ". str_word_count($ten) ."<br>";
echo "Dao nguoc chuoi '$ten': ". strrev($ten) ."<br>";
echo "Tim vi tu trong chuoi '$ten': ". strpos($ten, 'a') ."<br>";
echo "Thay the tu trong chuoi '$ten': ". str_replace('vinh', '', $ten) ."<br>";
echo "Chu in hoa: ". strtoupper($ten) ."<br>";
echo "Chu thuong: ". strtolower($ten) ."<br>";
echo "Xoa khoang trang du thua: ". trim($ten) ."<br>";
echo "Thay doi vi tri cac ki tu ngau nhien: ". str_shuffle($ten) ."<br>";
echo "So sanh chuoi (dua tren ma ascii): ". strcmp($ten, 'LE VINH HAN') ."<br>"; # 0: hai chuoi bang nhau, <0: chuoi 1 nho hon chuoi 2, >0: chuoi 1 lon hon chuoi 2
echo "Chuoi con duoc tao tu chuoi cha '$ten' (sub string): ". substr($ten, 3) ."<br>";
echo "Chuoi con duoc tao tu chuoi cha '$lop' (sub string): ". substr($lop, 0, 3) ."<br>";

$username = ['Garner', 'Vasquez', 'Moss', 'Wright', 'Pierce', 'Garrett', 'Lawrence', 'Smith', 'Ortega', 'Bates'];
$usernameString = implode(' - ', $username);

echo "Chuoi sau khi implode mang: ". $usernameString ."<br>";

$countryString = 'Hong Kong SAR China, Fiji, Iran, St. Kitts & Nevis, St. Pierre & Miquelon, Madagascar, Malta, Switzerland, Bermuda, Venezuela';
$countries = explode(', ', $countryString);
echo "Country: <br>";
foreach ($countries as $country) {
    echo $country ."<br>";
}

$chuanHoaChuoi = function($str) {
    $str = trim($str);
    $str = strtolower($str);
    $str = ucwords($str); # viet hoa chu cai dau tien moi tu
    return $str;
};

$str = "       le ViNh hAn  ";
echo "Chuoi truoc khi chuan hoa: {$str} <br>";
echo "Chuoi sau khi chuan hoa: {$chuanHoaChuoi($str)}";
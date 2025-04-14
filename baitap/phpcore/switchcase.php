<?php
echo "Switch-Case va Match trong php<br>";

$day = 4;

switch ($day) {
    case 1: $thu = "Chủ Nhật"; break;
    case 2: $thu = "Thứ Hai"; break;
    case 3: $thu = "Thứ Ba"; break;
    case 4: $thu = "Thứ Tư"; break;
    case 5: $thu = "Thứ Năm"; break;
    case 6: $thu = "Thứ Sáu"; break;
    case 7: $thu = "Thứ Bảy"; break;
    default: $thu = "Không hợp lệ";
}

echo $thu ."<br>";

# dung match() thay cho switch case truyen thong (dung cho php ver 8+)
$thang = 11;
$ketQua = match($thang) {
    1, 3, 5, 7, 8, 10, 12 => "Thang $thang co 31 ngay",
    4, 6, 9, 11 => "Thang $thang co 30 ngay",
    2 => "Thang $thang co 29 hoac 28 ngay",
    default => "Vui long nhap thang hop le",
};

echo $ketQua ."<br>";

$statusCode = 4;
$status = match($statusCode) {
    1 => "Dang chuan bi hang",
    2 => "Da giao cho don vi van chuyen",
    3 => "Dang van chuyen hang",
    4 => "Giao hang thanh cong",
    0 => "Da huy don hang",
    default => "Oops! ... "
};

echo "Trang thai don hang: ". $status ."<br>";
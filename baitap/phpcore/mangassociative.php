<?php
echo "Associative Array trong php<br>";

$cities = [
    'Vietnam' => 'Hochiminh',
    'England' => 'London',
    'Japan' => 'Hokkaido',
    'USA' => 'Texas',
    'China' => 'Beijing'
];

// echo $cities['Vietnam'];

echo "Kiem tra key co ton tai trong mang khong: ". array_key_exists('Vietnam', $cities) ."<br>";

foreach ($cities as $country => $city) {
    echo $country .": ". $city ."<br>";
}

echo "--------------------------------<br>";

$student = [
    "id" => 101,
    "name" => "Nguyễn Văn A",
    "age" => 20,
    "major" => "Công nghệ thông tin",
    "gpa" => 3.5
];

echo "Thong tin sinh vien: <br>";
foreach ($student as $key => $val) {
    echo $key .": ". $val ."<br>";
}

echo "Tên sinh viên: " . $student["name"] . "<br>";
echo "Ngành học: " . $student["major"] ."<br>";

echo "--------------------------------<br>";
$product = [
    "id" => "SP001",
    "name" => "Laptop Dell XPS 15",
    "price" => 35000000,
    "stock" => 10,
    "category" => "Laptop"
];

echo "Sản phẩm: " . $product["name"] . " - Giá: " . number_format($product["price"], 0, ',', '.') . " VND<br>";

echo "--------------------------------<br>";
$contacts = [
    "Alice" => "0987654321",
    "Bob" => "0978123456",
    "Charlie" => "0912345678"
];

foreach ($contacts as $name => $phone) {
    echo "$name: $phone <br>";
}

echo "--------------------------------<br>";
$employees = [
    "nv003" => ["name" => "Trần Văn B", "age" => 30, "position" => "Quản lý"],
    "nv001" => ["name" => "Lê Thị C", "age" => 25, "position" => "Nhân viên"],
    "nv002" => ["name" => "Phạm Đình D", "age" => 28, "position" => "Kế toán"]
];

foreach ($employees as $id => $info) {
    echo $id ." => ". $info['name']  ."<br>";
}

ksort($employees); // sap xep theo chieu tang dan dua tren key

foreach ($employees as $id => $info) {
    echo $id ." => ". $info['name']  ."<br>";
}

foreach ($employees as $id => $info) {
    echo "ID: ". $id ." - Name: ". $info['name'] ." - Position: ". $info['position'] ."<br>";
}
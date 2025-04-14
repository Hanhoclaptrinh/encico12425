<?php
echo "Ham trong php<br>";

function halo($message) {
    echo $message ."<br>";
}

halo('Chao em nha');
echo "--------------------------------<br>";

function getInfo($name, $age) {
    return [
        'Name' => $name,
        'Age' => $age
    ];
}

$info = getInfo('Hancode', 21);
echo 'Name: '. $info['Name'] .'<br>';
echo 'Age: '. $info['Age'] .'<br>';
echo "--------------------------------<br>";

function sumArr(...$arr) {
    return array_sum($arr);
}

echo 'Tong day: '. sumArr(1,2, 3, 4, 5, 6, 7, 8, 9, 10) .'<br>';
echo "--------------------------------<br>";

echo 'Ham an danh<br>';

$tongHaiSo = function($a, $b) {
    return $a + $b;
};

echo 'Tong hai so bang ham an danh: '. $tongHaiSo(3, 6) .'<br>';
echo "--------------------------------<br>";

echo "Ham mui ten trong php<br>";

$binhPhuong = fn($a) => pow($a, 2);
echo $binhPhuong(9) .'<br>';
echo "--------------------------------<br>";

# kiem tra so nguyen to
function isPrime($n) {
    if ($n < 2)
        return false;
    for ($i = 2; $i <= sqrt($n); $i++) {
        if ($n % $i == 0)
            return false;
    }
    return true;
}

$n = 21;
if (isPrime($n)) {
    echo $n .' la so nguyen to<br>';
} else {
    echo $n .' khong phai so nguyen to<br>';
}
echo "--------------------------------<br>";

# ham tinh giai thua cua mot so nguyen duong
$giaiThua = function($a) {
    $gt = 1;
    if ($a == 0 || $a == 1)
        return 1;
    if ($a < 0) 
        return 'Vui long nhap a la mot so nguyen duong!<br>';
    for ($i = 2; $i <= $a; $i++) {
        $gt *= $i;
    }
    return $gt;
};

echo $giaiThua(7) .'<br>';
echo "--------------------------------<br>";

# ham kiem tra chuoi palindrome (chuoi doi xung)
function isPalindrome($str) {
    $len = strlen($str);
    for ($i = 0; $i < $len / 2; $i++) {
        if ($str[$i] !== $str[$len - 1 - $i])
            return "'{$str}' khong phai mot chuoi palindrome<br>";
    }
    return "'$str' la mot chuoi palindrome<br>";
}

$str = 'DAD-MOM-MOM-DAD';
echo isPalindrome($str);
echo "--------------------------------<br>";

# tim so lon nhat trong mang
function maxArr($arr) {
    $max = $arr[0];
    for ($i = 1; $i < sizeof($arr); $i++) {
        if ($arr[$i] > $max)
            $max = $arr[$i];
    }
    return $max;
}

$arr = [3, 2, 7, 5, 1, 8, 9, 6, 0, 4];
echo maxArr($arr) .'<br>';
echo "--------------------------------<br>";

# dem so lan xuat hien cua mot phan tu trong mang
function tanSuat($arr, $val) {
    $cnt = 0;
    foreach ($arr as $a) {
        if ($a === $val)
            $cnt++;
    }
    return $cnt;
}

$arr = [1, 2, 3, 4, 2, 2, 5, 6, 2];
$val = 2;
echo "So lan xuat hien cua '{$val}' trong mang la: ". tanSuat($arr, $val) .'<br>';
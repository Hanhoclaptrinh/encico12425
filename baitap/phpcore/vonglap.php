<?php
echo "Vong lap trong php<br>";

echo "Vong lap for (lap voi so lan xac dinh)<br>";

for ($i = 1; $i <= 10; ++$i) {
    echo "Lan lap thu $i <br>";
}

echo "Cac so chia het cho 5: ";
for ($i = 0; $i <= 100; $i++) {
    if ($i % 5 == 0) {
        echo $i ." ";
    }
}
echo "<br>";

for ($i = 0; $i < 10; $i++) {
    for ($j = $i; $j < 10; $j++) {
        echo "*";
    }
    echo "<br>";
}

echo "Vong lap while (lap voi so lan khong xac dinh truoc - lap den khi dieu kien sai)<br>";
$i = 1;
while ($i <= 5) {
    echo "Lan lap thu $i <br>";
    $i++;
}

echo "Vong lap do-while (luon chay vong lap dau tien du cho dieu kien sai)<br>";
$i = 7;
do {
    echo "Lần lặp thứ $i <br>";
    $i++;
} while ($i <= 5);

echo "Vong lap foreach dung cho mang<br>";
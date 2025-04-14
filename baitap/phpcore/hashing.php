<?php

echo 'Hashing trong php<br>';

$password = 'levinhhan';

$hashedPassword = password_hash($password, PASSWORD_DEFAULT); # chon thuat toan tot nhat de ma hoa

echo $hashedPassword .'<br>';

if (password_verify($password, $hashedPassword)) {
    echo 'Mat khau hop le<br>';
} else {
    echo 'Mat khau khong hop le<br>';
}
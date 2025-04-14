<!-- Bài 4: Quản lý Tài khoản Ngân hàng
Yêu cầu:

Class BankAccount: accountNumber, ownerName, balance

Các phương thức:

deposit($amount)

withdraw($amount)

getBalance()

Mở rộng:

Ngăn rút quá số dư

Tạo class SavingAccount có lãi suất (interestRate) và tính lãi hàng tháng -->

<?php

echo "Quản lý tài khoản ngân hàng<br>";

class BankAccount {
    protected $accountNumber, $ownerName, $balance;

    public function __construct($accountNumber, $ownerName, $balance)
    {
        $this->accountNumber = $accountNumber;
        $this->ownerName = $ownerName;
        $this->balance = $balance;
    }

    public function deposit($amount) {
        if ($amount > 0) {
            $this->balance += $amount;
            echo "Nạp tiền thành công. Số dư mới: {$this->balance}<br>";
        } else {
            echo "Số tiền nạp không hợp lệ!<br>";
        }
    }

    public function withdraw($amount) {
        if ($amount <= 0) {
            echo "Số tiền rút không hợp lệ!<br>";
        } elseif ($amount > $this->balance) {
            echo "Không đủ số dư để rút {$amount}. Số dư hiện tại: {$this->balance}<br>";
        } else {
            $this->balance -= $amount;
            echo "Rút tiền thành công. Số dư còn lại: {$this->balance}<br>";
        }
    }

    public function getBalance() {
        return $this->balance;
    }

    public function display() {
        echo "Tài khoản: {$this->accountNumber}<br>";
        echo "Chủ tài khoản: {$this->ownerName}<br>";
        echo "Số dư: {$this->balance}<br>";
    }
}

class SavingAccount extends BankAccount {
    private $interestRate;

    public function __construct($accountNumber, $ownerName, $balance, $interestRate)
    {
        parent::__construct($accountNumber, $ownerName, $balance);
        $this->interestRate = $interestRate;
    }

    public function profit() {
        return $this->interestRate * $this->balance;
    }

    public function display() {
        parent::display();
        echo "Lãi suất: {$this->interestRate}<br>";
        echo "Lãi tháng này: " . $this->profit() . "<br>";
    }
}

$acc1 = new SavingAccount("TK001", "Nguyễn Văn A", 5000, 0.03);
$acc1->display();
$acc1->deposit(2000);
$acc1->withdraw(8000); 
$acc1->withdraw(1000); 
echo "<br>Số dư hiện tại: " . $acc1->getBalance();

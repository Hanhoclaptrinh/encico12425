<!--    Bài 1: Quản lý Sản phẩm

        Yêu cầu:

        Tạo class Product với các thuộc tính: id, name, price, quantity

        Tạo phương thức getTotal() trả về tổng giá trị (price * quantity)

        In thông tin sản phẩm và tổng tiền.

        Mở rộng:

        Tạo class ElectronicProduct kế thừa Product, thêm thuộc tính warranty (bảo hành)

        Ghi đè phương thức getTotal() nếu sản phẩm có bảo hành > 12 tháng thì giảm 5% giá.    -->

<?php
    echo "Quan ly san pham🛒<br>";
    define('CURRENCY', '💵');

    class Product {
        private $id, $name, $price, $quantity;

        public function __construct($id, $name, $price, $quantity) {
            $this->id = $id;
            $this->name = $name;
            $this->price = $price;
            $this->quantity = $quantity;
        }

        public function getTotal() {
            return $this->price * $this->quantity;
        }

        public function thongTin() {
            echo "Thong tin san pham:<br>";
            echo "San pham: {$this->name}<br>";
            echo "Gia moi san pham: ". CURRENCY ."{$this->price}<br>";
            echo "So luong: {$this->quantity}<br>";
            echo "Tong tien: ". CURRENCY ."{$this->getTotal()}<br>";
        }
    }

    class ElectronicProduct extends Product {
        private $warranty;

        public function __construct($id, $name, $price, $quantity, $warranty) {
            parent::__construct($id, $name, $price, $quantity);
            $this->warranty = $warranty;
        }

        public function getTotal() {
            return parent::getTotal() * ($this->warranty > 12 ? 0.95 : 1);
        }
        
        public function thongTin() {
            parent::thongTin();
            echo "Thoi gian bao hanh: {$this->warranty} thang<br>";
        }
    }

    $d = new ElectronicProduct('fas', 'fas', 10, 10, 13);
    $d->thongTin();
?>
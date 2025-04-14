<!-- Bài 5: Hệ thống Quản lý Thư viện
Yêu cầu:

Class Book: title, author, year, available

Class Library: danh sách các Book, có phương thức:

addBook(Book $book)

borrowBook($title)

returnBook($title)

listBooks() -->

<?php

echo "Quản lý thư viện<br>";

class Book {
    protected $title, $author, $year, $available;

    public function __construct($title, $author, $year, $available) {
        $this->title = $title;
        $this->author = $author;
        $this->year = $year;
        $this->available = $available;
    }

    public function getTitle() {
        return $this->title;
    }

    public function isAvailable() {
        return $this->available;
    }

    public function setAvailable($status) {
        $this->available = $status;
    }

    public function display() {
        echo "TITLE: {$this->title}<br>";
        echo "AUTHOR: {$this->author}<br>";
        echo "YEAR: {$this->year}<br>";
        echo "AVAILABLE: " . ($this->available ? "Yes ✅" : "No ❌") . "<br><br>";
    }
}


class Library {
    protected $books = [];

    public function addBook(Book $book) {
        $this->books[] = $book;
    }

    public function borrowBook($title) {
        foreach ($this->books as $book) {
            if ($book->getTitle() === $title && $book->isAvailable()) {
                $book->setAvailable(false);
                echo "Đã mượn sách: {$title}<br>";
                return true;
            }
        }
        echo "Không thể mượn sách: {$title} (Không tìm thấy hoặc đã mượn)<br>";
        return false;
    }

    public function returnBook($title) {
        foreach ($this->books as $book) {
            if ($book->getTitle() === $title && !$book->isAvailable()) {
                $book->setAvailable(true);
                echo "Đã trả sách: {$title}<br>";
                return true;
            }
        }
        echo "Không thể trả sách: {$title} (Không tìm thấy hoặc chưa mượn)<br>";
        return false;
    }

    public function listBooks() {
        echo "<strong>Danh sách sách trong thư viện:</strong><br>";
        foreach ($this->books as $book) {
            $book->display();
        }
    }
}

$book1 = new Book("Clean Code", "Robert C. Martin", 2008, true);
$book2 = new Book("Design Patterns", "GoF", 1994, true);
$book3 = new Book("You Don't Know JS", "Kyle Simpson", 2015, true);

$library = new Library();
$library->addBook($book1);
$library->addBook($book2);
$library->addBook($book3);

$library->listBooks();

$library->borrowBook("Design Patterns");
$library->borrowBook("Clean Code");

$library->returnBook("Design Patterns");

$library->listBooks();

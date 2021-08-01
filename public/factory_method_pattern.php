<?php

/*
* Factory Method Pattern
* Tạo interface có 1 method khởi tạo chung
* Class con sẽ tự định nghĩa loại object mà nó khởi tạo ra.
*
* Factory Method Pattern (hay còn được gọi với cái tên ngắn gọn hơn là Factory Pattern) 
là một design pattern thuộc nhóm khởi tạo (Creational patterns). Pattern này được sinh ra nhằm mục đích 
khởi tạo một đối tượng mới mà không cần thiết phải chỉ ra một cách chính xác class nào sẽ được khởi tạo. 
Factory Method Pattern giải quyết vấn đề này bằng cách định nghĩa một factory method cho việc tạo đối tượng 
và các lớp con thừa kế có thể override phương thức này để chỉ rõ đối tượng nào sẽ được khởi tạo.
    - Ưu điểm: Tạo ra 1 cách mới trong việc khởi tạo instance thông qua 1 interface chung. 
    Khởi tạo các đối tượng mà che giấu đi logic của cách khởi tạo ấy. Giảm sự phụ thuộc giữa các module,
    logic với các class cụ thể mà chỉ phụ thuộc vào interface hoặc abstract class để tăng tính mở rộng.


Factory Method Pattern phát huy được ưu điểm của nó trong một số trường hợp sau:
* Khi bạn chưa biết nên khởi tạo đối tượng mới từ class nào.
* Khi bạn muốn tập trung các đoạn code liên quan đến việc khởi tạo các đối tượng mới về cùng một nơi 
để dễ thao tác và xử lý.
* Khi bạn không muốn người dùng phải biết hết tên của các class có liên quan đến quá trình khởi tạo 
cũng như muốn che giấu, đóng gói toàn bộ logic của quá trình khởi tạo một đối tượng mới nào đó khỏi 
phía người dùng.
*/

// Class Cha
class Book {
    private $bookName;
    private $author;

    public function __construct($bookName, $author)
    {
        $this->bookName = $bookName;
        $this->author = $author;
    }

    public function getBookNameAndAuthor()
    {
        return $this->bookName . '-' . $this->author;
    }
}

// Interface 
interface IBook {
    public static function create($bookName, $author);
}

// Factory Class
class BookFactory implements IBook {
    public static function create($bookName, $author)
    {
        return new Book($bookName, $author);
    }
}

// $book1 = BookFactory::create('book1', 'author1');
// $book2 = BookFactory::create('book2', 'author2');

// echo $book2->getBookNameAndAuthor();


// ----------------------------------------------------- 


interface ITransport
{
    public function deliver() : string;
}

class Truck implements ITransport
{
    public function deliver(): string
    {
        return "Truck: Deliver by land";
    }
}

class Ship implements ITransport
{
    public function deliver(): string
    {
        return "Ship: Deliver by sea";
    }
}

abstract class Logistics
{
    abstract public function createTransport(string $transportType) : ITransport;
}

class RoadLogistic extends Logistics
{
    public function createTransport(string $transportType): ITransport
    {
        return $transportType === 'Truck' ? new Truck() : null;
    }
}

class SeaLogistics extends Logistics
{
    public function createTransport(string $transportType): ITransport
    {
        return $transportType === 'Ship' ? new Ship() : null;
    }
}

$roadLogistics = new RoadLogistic();
$roadTransport = $roadLogistics->createTransport('Truck');

$seaLogistics = new SeaLogistics();
$seaTransport = $seaLogistics->createTransport('Ship');

echo $roadTransport->deliver();
echo "<br>";
echo $seaTransport->deliver();
<?php
/*
- Thuộc nhóm behavior pattern
- Mục đích là tách rời phần xử lý 1 chức năng cụ thể ra khỏi đối tượng. 
Sau đó tạo ra 1 tập hợp các thuật toán xử lý chức năng đó và lựa chọn thuật toán 
nào chúng ta thấy đúng đắn nhất khi chạy chương trình (trong runtime). 
Thay thế cho việc kế thừa khi phải xử lý sửa chữa bảo trì các hành vi của đối 
tượng qua nhiều lớp con. 

Lợi ích của Strategy Pattern là gì?
* Đảm bảo nguyên tắc Single responsibility principle (SRP) : một lớp định nghĩa nhiều 
hành vi và chúng xuất hiện dưới dạng với nhiều câu lệnh có điều kiện. Thay vì nhiều 
điều kiện, chúng ta sẽ chuyển các nhánh có điều kiện liên quan vào lớp Strategy 
riêng lẻ của nó.
* Đảm bảo nguyên tắc Open/Closed Principle (OCP) : chúng ta dễ dàng mở rộng và kết 
hợp hành vi mới mà không thay đổi ứng dụng.
* Cung cấp một sự thay thế cho kế thừa.

Sử dụng Strategy Pattern khi nào?
* Khi muốn có thể thay đổi các thuật toán được sử dụng bên trong một đối tượng tại 
thời điểm run-time.
* Khi có một đoạn mã dễ thay đổi, và muốn tách chúng ra khỏi chương trình chính để 
dễ dàng bảo trì.
* Tránh sự rắc rối, khi phải hiện thực một chức năng nào đó qua quá nhiều lớp con.
* Cần che dấu sự phức tạp, cấu trúc bên trong của thuật toán.


refs; https://kieblog.vn/strategy-pattern-vi-du-trong-java/

Example: Go to Airport (Normal, Rich, Poor)

*/

interface TravelAble {
    public function run();
}

class Bus implements TravelAble {

    public function run()
    {
        return "Bus";
    }
}

class Car implements TravelAble {
    public function run() {
        return "Car";
    }
}

abstract class Person 
{
    protected $travelable;

    public function goToAirport() {
        return "Go ro Airport by ". $this->travelable->run();
    }
}

class BusinessMan extends Person
{
    public function __construct()
    {
        $this->travelable = new Car();
    }
}

class Student extends Person
{
    public function __construct()
    {
        $this->travelable = new Bus();
    }
}

$peter = new BusinessMan();
echo "Peter ". $peter->goToAirport();
echo "<br>";

$lisa = new Student();
echo "Lisa ". $lisa->goToAirport();
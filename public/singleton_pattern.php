<?php

/* Singleton Pattern: Thuộc nhóm Creational Pattern
- Đảm bảo mỗi class chỉ có một thể hiện duy nhất tại 1 thời điểm và tương tác thông qua instance này


Ưu điểm
Đảm bảo rằng chỉ có duy nhất một thể hiện của một lớp nào đó được tạo ra trong suốt quá trình thực thi 
chương trình nhờ đó giúp tiết kiệm tài nguyên hệ thống.
Dễ dàng cài đặt và triển khai.
Nhược điểm
Singleton Pattern hiện được xem là một anti-pattern và cũng đang gây ra rất nhiều tranh cãi trong 
cộng đồng lập trình viên. Điều này xuất phát từ một số nguyên nhân sau:

Nó vi phạm nguyên tắc đơn nhiệm (Single Responsibility Pattern – SRP) do một lớp áp dụng pattern 
này vừa phải chịu trách nhiệm xử lý các nghiệp vụ của riêng nó, vừa phải chịu trách nhiệm quản lý 
số lượng thể hiện được tạo ra của lớp và vừa cung cấp một điểm truy cập tới thể hiện đó.
Singleton Pattern xoay quanh việc thao tác với biến toàn cục (global state). Hầu hết các lập trình viên, 
đặc biệt là các lập trình viên theo hướng lập trình hàm (functional programming) đều đồng ý rằng việc sử dụng biến toàn cục trong chương trình là một trong những hành động mang lại rủi ro cao vì trong các chương trình lớn khả năng vô tình thay đổi giá trị của biến toàn cục này là không thể tránh khỏi. Giá trị của biến toàn cục bị thay đổi đồng nghĩa với việc kết quả của các đoạn code khác có phụ thuộc vào nó cũng sẽ bị thay đổi theo.
Lớp được cài đặt Singleton Pattern không thể kế thừa hay mở rộng được.
Việc cài đặt không hợp lý có thể dẫn đến một số vấn đề phát sinh có liên quan đến luồng (thread).
Nó cũng gây khó khăn trong quá trình kiểm thử.
Xuất phát từ những nguyên nhân trên mà đa phần các lập trình viên đều đưa ra lời khuyên nên tránh sử 
dụng Singleton Pattern một cách tối đa.

-- Vậy còn chút lý do gì để mình sử dụng Singleton Pattern không nhỉ?
Dù được coi là một anti-pattern, Singleton Pattern vẫn có thể được sử dụng trong một số trường hợp sau:

Ghi log: Đa phần các lập trình viên đều đồng ý rằng việc ghi log nên được áp dụng ở nhiều nơi trong code. 
Singleton pattern có thể phục vụ mục đích này mà không làm tổn hại đến khả năng đọc, kiểm tra hoặc 
bảo trì code sau này.
Truy cập database hoặc các tập tin của hệ thống: Singleton Pattern cũng có thể được sử dụng để truy 
cập database hoặc các tập tin của hệ thống, nó đảm bảo rằng chỉ có một điểm kết nối duy nhất đến
 cơ sở dữ liệu cũng như các tập tin của hệ thống nhờ đó giúp tăng tính linh hoạt cũng như tiết kiệm 
 được tài nguyên một cách đáng kể.

*/



class DatabaseManager
{
    private static $singletonDatabaseObj;

    private function __construct()
    {
        echo 'aaa';
        // prevent use new DatabaseManager;
    }

    public static function getInstance()
    {
        if (self::$singletonDatabaseObj === null) {
            self::$singletonDatabaseObj = new self();
        }

        return self::$singletonDatabaseObj;
    }
}

$db = DatabaseManager::getInstance();
// $db2 = new DatabaseManager(); -> throw Fatal error
var_dump($db1);
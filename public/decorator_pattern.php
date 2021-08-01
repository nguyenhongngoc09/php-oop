<?php

/**
 * Decorator Pattern thuộc nhóm Stuctural. Nó cung cấp khả năng mở rộng 1 object bằng
 * cách đính kèm biến hoặc phương thức mới cho 1 object.
 * Việc này thực hiện bằng cách wrapper đối tượng đã có bằng 1 đối tượng mới. 
 * Thông qua đối tượng wrapper này chúng ta sẽ cung cấp thêm các hành vi mong muốn vào
 * Hay nói cách khác, Decorator Pattern cho phép chúng ta thêm chức năng mới vào 
 * đối tượng đã có mà không ảnh hưởng đến các đối tượng khác 
 * (đã liên kết với đối tượng đã có).

 * Mỗi khi cần thêm tính năng mới,chúng ta có thể đưa đối tượng hiện có wrap trong 
 * 1 đối tượng mới – gọi là Decorator Class.
 * 
 * 
 * --> Áp dụng cho các hệ thống cần mở rộng liên tục. 
 * 
 * 
 * 
 * --- Các thành phần có trong design pattern này
 * 
 * Component: (interface) chung để các đối tượng cần thêm chức năng implement nó.
 * Concrete component: Một implementation cần thêm chức năng trong quá trình chạy
 * Decorator: Một lớp trừu tượng (abstract class) để duy trì 1 tham chiếu của đối tượng
 * thành phần đồng thời cài đặt các thành phần của giao diện
 * Concrete Decorator: Một cài đặt của Decorator, nó cài đặt thêm các thành phần vào 
 * đầu của các đối tượng thành phần
 * 
 * Refs: http://codetutam.com/decorator-pattern-trong-php-la-gi/
 * 
 * Example: Pizza
 */

 // Component
interface PizzaInterface {
    public function doPizza();
}

// Concrete component
class Pizza implements PizzaInterface 
{
    public function doPizza()
    {
        return "Pizza";
    }
}

// Decorator
abstract class PizzaDecorator implements PizzaInterface
{
    protected $pizza;

    public function __construct(PizzaInterface $pizza)
    {
        $this->pizza = $pizza;
    }

    public function doPizza()
    {
        return $this->pizza->doPizza();
    }
}

// Concrete Decorator
class BeefPizza extends PizzaDecorator
{    
    public function __construct(PizzaInterface $pizza)
    {
        return parent::__construct($pizza);
    }

    public function doPizza(): string
    {
        $pizza = $this->pizza->doPizza();

        return $pizza . $this->addBeef();
    }

    /**
     * @return string
     */
    public function addBeef(): string
    {
        return " + beef";
    }

}

class FishPizza extends PizzaDecorator
{
    public function __construct(PizzaInterface $pizza)
    {
        return parent::__construct($pizza);
    }

    public function doPizza()
    {
        $pizza = $this->pizza->doPizza();

        return $pizza . $this->addFish();
    }

    public function addFish()
    {
        return " + fish";
    }
}

// ---------------------

$buyBeefPizza = new BeefPizza(new Pizza());
$buyFishBeefPizza = new FishPizza(new BeefPizza(new Pizza()));
echo $buyFishBeefPizza->doPizza();
<?php


/**
 * Class Recursion
 */
class Recursion extends LeetCodeBase
{

    function execute()
    {
        $n = 8;

        // return $this->giaiThua($n);
        $a = [];

        $i = 0;
        while ($i <= $n) {
            $a[$i] = $this->fib($i);
            $i++;
        }

        echo implode(',', $a);
    }

    /**
     * Tính giai thừa
     * Bài toán cơ sở: 0! = 1; ==> __giaiThua(0) = 1;
     * Tổng quát: n! = n*(n-1)!; ==> __giaiThua(n) = n*__giaiThua(n-1);
     *
     */
    public function giaiThua($n)
    {
        // Bài toán cơ sở
        if ($n == 0) {
            return 1;
        }

        // Công thức tổng quát
        return $n * $this->giaiThua($n-1);
    }

    /**
     * Dãy số Fibonacci: Với 2 số ban đầu là 0, 1 hoặc 1, 1 thì số tiếp
     * theo là tổng của 2 số liền trước nó
     *
     * Công thức tổng quát: F(n) = F(n-1)+ F(n-2)
     */
    public function fib($n)
    {
        // var_dump($n);
        // Bai toan co so
        if ($n < 2) {
            return 1;
        }

        // Cong thuc tong quat
        return $this->fib($n-1) + $this->fib($n-2);
    }

    /**
     * Ham Fibonacci bằng cách tối ưu đệ quy bằng cách nhớ
     *
     */
}
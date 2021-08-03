<?php


class BubbleSort extends LeetCodeBase
{
    /**
     * Chạy từ đầu đến cuối mảng
     * Nếu phần tử trc mà lớn hơn phần tử sau -> Đổi chỗ
     * Sau mỗi vòng lặp thì phần tử lớn nhất sẽ ở cuối mảng
     **/
    function execute()
    {
        $a = [4,2,1,3,6,5];
        $n = count($a);
        for ($i = 0; $i < $n; $i++) {
            $isSorted = true;
            for ($j = 0; $j < $n-$i-1; $j++) {
                if ($a[$j] > $a[$j+1]) {
                    $isSorted = false;

                    // swap
                    $tmp = $a[$j];
                    $a[$j] = $a[$j+1];
                    $a[$j+1] = $tmp;
                }
            }

//            var_dump(implode(',', $a));
            if ($isSorted) {
                break;
            }
        }

        echo implode(',', $a);
    }
}
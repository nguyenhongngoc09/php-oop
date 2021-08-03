<?php


class SelectionSort extends LeetCodeBase
{
    /**
     * Chạy từ đầu đến cuối mảng
     * Tại vòng lặp thứ i, tìm phần tử nhỏ nhất từ [i+1, n-1] nếu nhỏ hơn a[i]=> đổi chỗ a[i]
     * Sau vòng lặp i thì [0,i] đã đc sắp xếp
     */
    function execute()
    {
        $a = [4,2,2,3,1,5];
        $n = count($a);

        for ($i = 0; $i < $n; $i++) {
            $minIndex = $i;
            for ($j = $i+1; $j < $n; $j++) {
                if ($a[$j] < $a[$minIndex]) {
                    $minIndex = $j;
                }
            }

            if ($minIndex != $i) {
                $tmp = $a[$i];
                $a[$i] = $a[$minIndex];
                $a[$minIndex] = $tmp;
            }

            var_dump(implode(',', $a));
        }

        echo implode(',', $a);
    }
}
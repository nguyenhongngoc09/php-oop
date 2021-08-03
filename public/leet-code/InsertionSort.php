<?php


class InsertionSort extends LeetCodeBase
{
    /**
     * Chạy từ đầu đến cuối mảng
     * Tại vòng lặp i, coi như mảng [0,i-1] đã đc sắp xếp, chèn a[i] vào vi tri thich hop
     * Sau vòng lặp i thì [0,i] đã đc sắp xếp
     */
    function execute()
    {
        $a = [4,2,1,3,6,5];
        $n = count($a);

        for ($i = 1; $i < $n; $i++) {
            $ai = $a[$i];
            $j = $i - 1;

            while ($j >= 0 && $ai < $a[$j]) {
                $a[$j + 1] = $a[$j];
                $j--;
            }

            $a[$j + 1] = $ai;
        }

        echo implode(',', $a);
    }
}
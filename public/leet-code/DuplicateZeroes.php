<?php


class DuplicateZeroes extends LeetCodeBase
{
    /**
     * $a = [1,0,2,4,0,5,0];
     * Nhân đôi số 0 trong mảng giữ nguyên size của mảng
     *
     */
    function execute()
    {
        $a = [1,0,2,4,0,5,0,4,2];

        $n = count($a);

        for ($i = 0; $i < $n; $i++) {
            if ($a[$i] == 0 && $i!=$n-1) {
                // Move to right 1 step
                for ($j = $n-2; $j>=$i+1; $j--) {
                    $a[$j+1] = $a[$j];
                }
                $a[$i+1] = 0;
                $i++;
            }
//            var_dump(implode(',', $a));
        }

        echo implode(',', $a);
    }
}
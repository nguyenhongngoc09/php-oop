<?php


class MergeSortedArray extends LeetCodeBase
{
    /**
     * $a1 = [1,2,3,0,0,0];
     * $a2 = [2,4,6];
     *
     * => OutPut = [1,2,2,3,4,6]
     */
    function execute()
    {
        $a1 = [1,2,3,0,0,0]; $n1 = 3;
        $a2 = [2,5,6]; $n2 = count($a2);

        $i = $n1-1;
        $j = $n2-1;
        $k = $n1+$n2-1;

        while ($i >=0 || $j >= 0) {
            if ($i >= 0 && $j >= 0) {
                if ($a1[$i] >= $a2[$j]) {
                    $a1[$k] = $a1[$i];
                    $i--;
                } else {
                    $a1[$k] = $a2[$j];
                    $j--;
                }
            } else if ($i>=0) {
                $a1[$k] = $a1[$i];
                $i--;
            } else {
                $a1[$k] = $a2[$j];
                $j--;
            }

            $k--;

//            var_dump(implode(',', $a1));
        }

        echo implode(',', $a1);
    }
}
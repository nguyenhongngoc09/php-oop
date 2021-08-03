<?php


class RemoveElement extends LeetCodeBase
{
    /**
     * $a = [1,2,4,2,1,3]; $val = 2;
     * Output $a = [1,4,1,3,_,_];
     */
    function execute()
    {
        $a = [1,1,2,2,1,2]; $val = 2;
        $n = count($a);

        $i = 0;
        while ($i < $n) {
            if ($a[$i] == $val) {
                for ($j = $i; $j<$n-1;$j++) {
                    $a[$j] = $a[$j+1];
                }
                $a[$n-1] = '_';
                $n--;
            } else {
                $i++;
            }
            var_dump(implode(',', $a) . '-- k = '. $n);
        }

        echo implode(',', $a);
    }
}
<?php

class MaxConsecutiveOnes extends LeetCodeBase
{
    /**
     * $array = [1,1,0,1,1,1];
     * Show count max consecutive ones
     */
    function execute()
    {
        $a = [1,1,0,1,1,1];
        $count = $max = 0;

        for ($i = 0; $i < count($a); $i++) {
            $count = $a[$i] == 0 ? 0 : $count + 1;
            $max = max([$max, $count]);
        }

        echo $max;
    }
}
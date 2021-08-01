<?php


class TotalNumbersHasEvenNumberCharacters extends LeetCodeBase
{
    /**
     * $input = [12,1,3,1023];
     * Show count numbers has even digits
     */
    function execute()
    {
        $a = [12,1,3,1023];

        $count = 0;

        // log way
        $resultInput = array_filter($a, function($num) {
            return !(log10($num)+1 & 1);
        });

        $count = count($resultInput);

        // normal way;
        // for ($i = 0; $i < count($input); $i++) {
        //     $digits = strlen($input[$i]);

        //     if ($digits % 2 == 0) {
        //         $count++;
        //     }
        // }

        echo $count;
    }
}
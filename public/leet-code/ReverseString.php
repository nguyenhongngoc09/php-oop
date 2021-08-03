<?php


class ReverseString extends LeetCodeBase
{
    /**
     * $a = ['h', 'e', 'l', 'l', 'o'];
     *
     * $output = ['o', 'l', 'l', 'e', 'h']
     */
    function execute()
    {
        $a = ['h', 'e', 'l', 'a','s'];
        $n = count($a);

        // Normal way
        // $j = $n-1;
        // for ($i = 0; $i < $n; $i++) {
        //     if ($j > $i) {
        //         $tmp = $a[$i];
        //         $a[$i] = $a[$j];
        //         $a[$j] = $tmp;
        //     }

        //     $j--;
        // }

        // recursion way
        $this->swapString($a, 0, $n-1);

        echo implode(',', $a);
    }

    /**
     * @param $a
     * @param $i
     * @param $j
     */
    public function swapString(&$a, $i, $j)
    {
        if ($j > $i) {
            $tmp = $a[$i];
            $a[$i] = $a[$j];
            $a[$j] = $tmp;

            $this->swapString($a, $i+1, $j-1);
        }
    }
}
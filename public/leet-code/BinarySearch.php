<?php


class BinarySearch extends LeetCodeBase
{
    /**
     * Tìm kiếm nhị phân dùng đệ quy
     */
    function execute()
    {
        $a = [-3,0,1,2,4,5,7,9];
        $target = 7;

        echo $this->bSearch($a, 0, count($a), $target);
    }

    /**
     * @param $a
     * @param $leftIdx
     * @param $rightIdx
     * @param $target
     * @return int
     */
    public function bSearch($a, $leftIdx, $rightIdx, $target): int
    {
        // Stop condition
        if ($leftIdx > $rightIdx)
            return -1;

        $k = (int) (($leftIdx + $rightIdx) / 2);

        if ($a[$k] == $target)
            return $k;

        if ($a[$k] < $target) {
            return $this->bSearch($a, $k + 1, $rightIdx, $target);
        } else {
            return $this->bSearch($a, 0, $k - 1, $target);
        }
    }
}
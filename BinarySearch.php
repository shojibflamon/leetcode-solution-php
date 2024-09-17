<?php

/*
 * Time Complexity: O(log N) if array is sorted
 *  Best Case: O(1)
 *  Average Case: O(log N)
 *  Worst Case: O(log N)
 * Auxiliary Space: O(1)
 * */

class BinarySearch
{
    public function search($arr, $target)
    {
        $low = 0;
        $high = count($arr) - 1;
        while ($low <= $high) {
            $mid = $low + floor(($high - $low) / 2);
            
            if ($arr[$mid] === $target) {
                return $mid;
            }
            
            if ($arr[$mid] < $target) {
                $low = $mid + 1;
            } else {
                $high = $mid - 1;
            }
        }
        return -1;
    }
    
    public function recursiveSearch($arr, $target, $low, $high)
    {
        if ($low <= $high) {
            $mid = $low + floor(($high - $low) / 2);
            if ($arr[$mid] === $target) {
                return $mid;
            }
            
            if ($arr[$mid] < $target) {
                $low = $mid + 1;
            } else {
                $high = $mid - 1;
            }
            
            return $this->recursiveSearch($arr, $target, $low, $high);
        }
        
        return -1;
    }
}

$arr = [2, 5, 8, 12, 16, 23, 38, 56, 72, 91, 95];
$target = 95;

$bs = new BinarySearch();
$res = $bs->search($arr, $target);

echo "<pre>", print_r($res, true), '</pre>';


$low = 0;
$high = count($arr) - 1;
$recRes = $bs->recursiveSearch($arr, $target, $low, $high);

echo "<pre>", print_r($recRes, true), '</pre>';
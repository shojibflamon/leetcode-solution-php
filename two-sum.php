<?php

class Solution
{
    
    /*
     * Time Complexity: O(n)
     *  Best Case: O(1)
     *  Average Case: O(n)
     *  Worst Case: O(n) - function has to iterate through the entire array
     * Auxiliary Space: O(n)
     *  In the worst case, the hash map could store every number in the array (if the solution is at the end or if there is no solution).
     *  Thus, the space complexity is O(n),
     *  where n is the size of the input array. The hash map grows in proportion to the size of the input array.
     * */
    
    /**
     * @param  Integer[]  $nums
     * @param  Integer  $target
     * @return Integer[]|Integer
     */
    
    public function twoSum(array $nums, int $target): array|int
    {
        $map = [];  // HashMap to store complement values
        
        foreach ($nums as $i => $iValue) {
            $complement = $target - $iValue;
            
            if (isset($map[$complement])) {
                return [
                    $map[$complement],
                    $i
                ];
            }
            
            $map[$iValue] = $i;
        }
        
        return -1;
    }
    
    
    
    /*
     * Time Complexity: O(n)
     *  Best Case: O(1)
     *  Average Case: O(n)
     *  Worst Case: O(n) - function has to iterate through the entire array
     * Auxiliary Space: O(1) - No additional space required that grows with the input size
     * */
    public function twoSumUsingPointer($nums, $target): array|int
    {
        $start = 0;
        $end = count($nums) - 1;
        
        while ($start <= $end) {
            $sum = $nums[$start] + $nums[$end];
            if ($sum === $target) {
                return [$start, $end];
            }
            
            if ($sum < $target) {
                $start++;
            } else {
                $end--;
            }
        }
        
        return -1;
    }
    
    public function twoSumUsingPointerRecursion($nums, $target, $start, $end): array|int
    {
        if ($start <= $end) {
            $sum = $nums[$start] + $nums[$end];
            if ($sum === $target) {
                return [$start, $end];
            }
            
            if ($sum < $target) {
                $start++;
            } else {
                $end--;
            }
            return $this->twoSumUsingPointerRecursion($nums, $target, $start, $end);
        }
        
        return -1;
    }
}

$nums = [2, 7, 11, 15];
$target = 17;
$solution = new Solution();
$result = $solution->twoSum($nums, $target);
echo "<pre>", print_r($result, true), '</pre>';

$result = $solution->twoSumUsingPointer($nums, $target);
echo "<pre>", print_r($result, true), '</pre>';

$start = 0;
$end = count($nums) - 1;
$result = $solution->twoSumUsingPointerRecursion($nums, $target, $start, $end);
echo "<pre>", print_r($result, true), '</pre>';
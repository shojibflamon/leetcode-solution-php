<?php

class Solution
{
    
    /**
     * @param  Integer[]  $nums
     * @param  Integer  $target
     * @return Integer[]
     */
    function twoSum($nums, $target)
    {
        $map = [];  // HashMap to store complement values
        
        $len = count($nums);
        
        for ($i = 0; $i < $len; $i++) {
            $complement = $target - $nums[$i];
            
            if (isset($map[$complement])) {
                return [
                    $map[$complement],
                    $i
                ];
            }
            
            $map[$nums[$i]] = $i;
        }
    }
}

$nums = [2, 7, 11, 15];
$target = 9;
$solution = new Solution();
$result = $solution->twoSum($nums, $target);
echo "<pre>", print_r($result, true), '</pre>';
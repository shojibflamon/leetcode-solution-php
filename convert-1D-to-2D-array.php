<?php

class Solution
{
    
    /**
     * @param  Integer[]  $original
     * @param  Integer  $m
     * @param  Integer  $n
     * @return Integer[][]
     */
    function construct2DArray($original, $m, $n)
    {
        $length = count($original);
        $twoDArray = [];
        
        if ($m * $n === $length) {
            foreach ($original as $i => $iValue) {
                $twoDArray[$i / $n][$i % $n] = $iValue;
            }
        }
        
        return $twoDArray;
    }
}

$original = [1, 2, 3, 4];
$m = 2;
$n = 2;
$solution = new Solution();
$result = $solution->construct2DArray($original, $m, $n);
echo "<pre>", print_r($result, true), '</pre>';
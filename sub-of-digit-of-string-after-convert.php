<?php

class Solution
{
    
    /**
     * @param  String  $s
     * @param  Integer  $k
     * @return Integer
     */
    function getLucky($s, $k)
    {
        // Convert
        $stringSplit = str_split($s);
        
        $number = '';
        foreach ($stringSplit as $item) {
            $number .= ord($item) - 96;
        }
        
        // Transform
        for ($i = 0; $i < $k; $i++) {
            $numberSplit = str_split($number);
            $number = array_sum($numberSplit);
        }
        
        return $number;
    }
}

$string = 'leetcode';
$k = 2;
$solution = new Solution();
$result = $solution->getLucky($string, $k);
echo "<pre>", print_r($result, true), '</pre>';
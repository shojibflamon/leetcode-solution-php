<?php

use Couchbase\IndexFailureException;

class Solution
{
    
    /**
     * @param  String  $s
     * @return Integer
     */
    function romanToInt($s)
    {
//        return $this->romanToIntV1($s);
//        return $this->romanToIntV2($s);
        return $this->romanToIntV3($s);
    }
    
    public function romanToIntV3($s): int
    {
        $romanIndex = [
            'I' => 1,
            'V' => 5,
            'X' => 10,
            'L' => 50,
            'C' => 100,
            'D' => 500,
            'M' => 1000
        ];
        $strings = str_split($s);
        $length = strlen($s);
        $integer = 0;
        
        foreach ($strings as $index => $character) {
            $ch1 = $romanIndex[$character];
            if ($index + 1 < $length && $ch1 < $romanIndex[$strings[$index + 1]]) {
                $integer -= $ch1;
            } else {
                $integer += $ch1;
            }
        }
        return $integer;
    }
    
    public function romanToIntV2($s): int
    {
        $romanIndex = [
            'I' => 1,
            'V' => 5,
            'X' => 10,
            'L' => 50,
            'C' => 100,
            'D' => 500,
            'M' => 1000
        ];
        $strings = str_split($s);
        $length = strlen($s);
        $integer = 0;
        
        for ($i = $length - 1; $i >= 0; $i--) {
            $indexValue = $romanIndex[$strings[$i]];
            
            if (4 * $indexValue < $integer) {
                $integer -= $indexValue;
            } else {
                $integer += $indexValue;
            }
        }
        return $integer;
    }
    
    public function romanToIntV1($s): int
    {
        $romanIndex = [
            'I' => 1,
            'V' => 5,
            'X' => 10,
            'L' => 50,
            'C' => 100,
            'D' => 500,
            'M' => 1000,
            'IV' => 4,
            'IX' => 9,
            'XL' => 40,
            'XC' => 90,
            'CD' => 400,
            'CM' => 900,
        ];
        
        $strings = str_split($s);
        $integer = 0;
        foreach ($strings as $index => $item) {
            if ($index > 0) {
                $previousItem = $strings[$index - 1];
                
                $mergedItem = $previousItem.$item;
                if (isset($romanIndex[$mergedItem])) {
                    $integer += $romanIndex[$mergedItem];
                    $integer -= $romanIndex[$previousItem];
                } else {
                    $integer += $romanIndex[$item];
                }
            } else {
                $integer += $romanIndex[$item];
            }
        }
        
        return $integer;
    }
}

$roman = 'MCMXCIV';
$solution = new Solution();
$result = $solution->romanToInt($roman);
echo "<pre>", print_r($result, true), '</pre>';
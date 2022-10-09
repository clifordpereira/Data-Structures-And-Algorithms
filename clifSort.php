<?php 
// given an array sort it in ascending order
function clifSort($arr)
{
    for ($i=0; $i < (count($arr) - 1); $i++) { 
        if ($arr[$i] > $arr[$i+1]) {
            $j=$i+1;
            while ( ($j > 0) && ($arr[$j] < $arr[$j-1]) ) {
                $temp = $arr[$j-1];
                $arr[$j-1] = $arr[$j];
                $arr[$j] = $temp;
                $j--;        
            }            
        } 
    }

    return $arr;
}


$arr = [9,10,8,7,8,74,2,5,9,101];

print_r(clifSort($arr));
?>
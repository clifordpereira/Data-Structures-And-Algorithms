<?php 
function mergeSortRecursiive($arr)
{
    $n = count($arr);
    mergeSort($arr, 0, $n-1);

    return $arr;
}


function mergeSort(&$arr, $l, $h)
{
    if ($l < $h) {
        $mid = floor(($l + $h)/2);
        mergeSort($arr, $l, $mid);
        mergeSort($arr, $mid+1, $h);
        merge($arr, $l, $mid, $h);
    }
}


function merge(&$arr, $l, $mid, $h)
{
    $A = [];
    $B = [];
    for ($i=$l; $i <= $mid; $i++) { 
        $A[] = $arr[$i];
    }
    for ($j=$mid+1; $j <= $h; $j++) { 
        $B[] = $arr[$j];
    }

    $i = $j = 0;
    $k = $l;
    $m = count($A);
    $n = count($B);

    while ( ($i < $m) && ($j < $n) ) {
        if ($A[$i] < $B[$j]) {
            $arr[$k++] = $A[$i++];
        } else {
            $arr[$k++] = $B[$j++];
        }
    }

    for (; $i < $m; $i++) { 
        $arr[$k++] = $A[$i];
    }
    for (; $j < $n; $j++) { 
        $arr[$k++] = $B[$j];
    }
}

$arr = [4,12,11,7,16,55,7,9,0,5,61];
// $arr = [9,3,7,5,6,4,8,2];

print_r(mergeSortRecursiive($arr));
?>
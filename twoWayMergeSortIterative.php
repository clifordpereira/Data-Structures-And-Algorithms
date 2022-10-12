<?php 
function twoWayMergeSortIterative($arr)
{
    $twoDArray = [];
    foreach ($arr as $element) {
        $twoDArray[][] = $element;
    }
    $arr = $twoDArray;

    $n = count($arr);

    for ($i=$n; $i>=1; $i/=2) { 
        $m = count($arr);
        $L = [];

        for ($j=0; ($j+2) <= $m; $j+=2) {
            $L[] = merge($arr[$j], $arr[$j+1]);
        }
        if ($m % 2 == 1) {
            $L[] = $arr[$j];
        }
        $arr = $L;
    }

    return $arr[0];
}


function merge($A, $B)
{
    $M = [];
    $i = $j = 0;
    $m = count($A);
    $n = count($B);

    while ( ($i < $m) && ($j < $n) ) {
        if ($A[$i] < $B[$j]) {
            $M[] = $A[$i++];
        } else {
            $M[] = $B[$j++];
        }
    }

    for (; $i < $m; $i++) { 
        $M[] = $A[$i];
    }
    for (; $j < $n; $j++) { 
        $M[] = $B[$j];
    }

    return $M;
}

$arr = [4,12,11,7,16,55,7,9,0,5,61];

print_r(twoWayMergeSortIterative($arr));
?>
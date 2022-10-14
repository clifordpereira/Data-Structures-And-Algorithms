<?php 
function quickSort(&$arr, $l, $h)
{
    if ($l < $h) {
        $j = partition($arr, $l, $h);
        quickSort($arr, $l, $j);
        quickSort($arr, $j+1, $h);
    }
}


function partition(&$arr, $l, $h)
{
    $pivot = $arr[$l];
    $i = $l;
    $j = $h;

    while ($i < $j) {
        do {
            $i++;
        } while ($arr[$i] <= $pivot);

        do {
            $j--;
        } while ($arr[$j] > $pivot);

        if ($i < $j) {
            swap($arr, $i, $j);
        }
    }    
    swap($arr, $l, $j);

    return $j;
}

function swap(&$ap, $a, $b)
{
    $temp = $ap[$a];
    $ap[$a] = $ap[$b];
    $ap[$b] = $temp;
}

$arr = [10,16,8,12,15,6,3,9,5];
$n = count($arr);
$arr[] = PHP_INT_MAX;

quickSort($arr, 0, $n);

echo implode(" ", $arr);
?>
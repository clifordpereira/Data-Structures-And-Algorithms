<?php 
$stages=4;
$n=8;
$Cost = [];
$d = [];
$Path = [];


$inputArray = [ [1,2,2],[1,3,1],[1,4,3],[2,5,2],[2,6,3],[3,5,6],[3,6,7],[4,5,6],[4,6,8],[4,7,9],[5,8,6],[6,8,4],[7,8,5] ];

$C = array_fill(0, 9, array_fill(0, 9, 0));
foreach ($inputArray as $key => $value) {
    $C[$value[0]][$value[1]] = $value[2];
}

// <PRINTING input
echo "_  ";
for ($i=0; $i <= $n; $i++) { 
    echo "$i ";
}
echo "\n";

foreach ($C as $key => $value) {
    echo $key . ": " . implode(" ", $value) . "\n";
}
// PRINTING>

$Cost[$n] = 0;

for ($i=$n-1; $i >= 1; $i--) { 
    $min = 32767;
    for ($k=$i+1; $k <= $n; $k++) { 
        if ( ($C[$i][$k] != 0) && ($C[$i][$k] + $Cost[$k] < $min) ) {
            $min = $C[$i][$k] + $Cost[$k];
            $d[$i] = $k;
        }
    }
    $Cost[$i] = $min;
}

ksort($Cost);
echo "\nCost: " . implode(" ", $Cost) . "\n";

ksort($d);
echo "d: " . implode(" ", $d) . "\n";

$P[1]=1;
$P[$stages]=$n;
for ($i=2; $i < $stages; $i++) { 
    $P[$i] = $d[$P[$i-1]];
}

ksort($P);
echo "P: " . implode(" ", $P);
?>
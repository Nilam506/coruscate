<?php 

function mini($x, $y) 
{ 
	$num = 0; 
	while ($x and $y) 
	{ 
		$x--; 
		$y--; 
		$num++; 
	} 
	return $num; 
} 
function minimum( $array, $len) 
{ 
	$n = $array[0]; 
	for ($i = $len - 1; $i; $i--)
		$n = mini($n, $array[$i]); 
	return $n; 
} 

$array = array(2, 3, 1, 4); 
$len = count($array); 
echo minimum($array, $len); 
?> 


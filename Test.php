<?php
$submit	= $_POST['submit'];
$n 	= $_POST['num'];

if($submit)
{
	pattern1($n);
	pattern2($n);
}
function pattern1($num)
{
	$n = 65;
	for($i = 0;$i < $num;$i++)
	{
		for($j = 0;$j <= $i;$j++)
		{
			$char = chr($n);
			echo $char." ";
			$n = $n+1;
		}
		echo "<br>";
	}	
}
function pattern2($n)
{
	$num = 1; 
	$gap = $n - 1; 

	for ($j = 1; $j <= $n; $j++) 
	{ 
  	  	$num = $j; 
  
                for ($i = 1; $i <= $gap; $i++)
		{
			printf(" "); 
		} 
	        
  
  		$gap --; 
  
    		for ($i = 1; $i <= $j; $i++) 
    		{ 
        		printf($num);  
        		$num++; 
    		} 
    		$num--; 
    		$num--; 
		for ($i = 1; $i < $j; $i++) 
    		{ 
        		printf($num);  
        		$num--; 
    		} 
    		printf("<br>");
	}	
}
?>
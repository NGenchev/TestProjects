<?php

function sumOf($x, $sum)
{
	if($x>0)
	{
		$sum += $x;
		return sumOf(--$x, $sum);
	}
	else
		return $sum;

	
	/* if($x>0)
	 {
	 	echo $x . "\n";
	 	return sumOf($x-1)+$x;
	 }
	 else
		return 0;
	*/
}

$fakeFile = fopen("php://stdin", "r");
$x = (int)trim(fgets($fakeFile));

echo "Sumata na chislata e: ".sumOf($x, 0);
<?php

function getNumber($sum, $sub, $x = 1)
{
	if($x <= 9)
	{
		$y = $sum-$x;

		$xy = 10*$x+$y;
		$yx = 10*$y+$x;

		if(($yx-$xy==$sub) && ($x+$y==$sum))
			return 10*$x+$y;
		else
			return getNumber($sum, $sub, ++$x);
	}
	else
		return 0;
}

$fakeFile = fopen("php://stdin", "r");

$sum = (int)trim(fgets($fakeFile));
$sub = (int)trim(fgets($fakeFile));

echo "Chisloto e: " . getNumber($sum, $sub);

/*
for($x = 1; $x<7; $x++)
  for($y = 9; $y>5; $y--)
	if($x+$y == $sum)
	{
		$subTemp = (10*$y+$x)-(10*$x+$y);
		if($subTemp==$sub)
			echo (10*$x+$y);
	}
*/
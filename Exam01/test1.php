<?php // get digit in number

function getNinM($arr)
{
	$n = (int)$arr[1];
	$m = $arr[2];
	$p = (bool) ($arr[3] == "true" ? true : false);

	$removeArr = array(".", ",");
	$m = str_replace($removeArr, "", $m);

	$digits = strlen($m);

	if((int)$m <= 0)
		echo "Parameter not a number!";
	elseif($n > $digits)
		echo "The number doesn't have $n digits!";
	else
		echo $p ? $m[$digits-$n] : $m[$n-1];
}

if($argc > 1)
	getNinM($argv);
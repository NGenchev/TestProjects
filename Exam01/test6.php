<?php

function printAlpha($a, $z)
{
	$row = "";
	for( $i = ord($a) ; $i <= ord($z) ; $i++ )
 		$row .= chr($i);

 	return $row;
}

$fakeFile  	= fopen('php://stdin', 'r');
$x	= (string)trim(fgets($fakeFile));
$y	= (string)trim(fgets($fakeFile));

echo printAlpha($x, $y);
<?php //Cezar`s encrypt

function cezar_crypter($type, $text, $symbols) //encr
{
	$text = str_split($text);
	$newText = "";
	$symbols = (int)$symbols;
	foreach($text as $char)
	{
		$char = ord($char);
		$char = $type == 1 ? $char + $symbols : $char - $symbols; 
      	$char = chr($char);
      	$newText .= $char; 
	}

	echo $newText;
}

echo "Choose: \nEncrpyt(1)\nDecrypt(2)\n\n"; //menu

// get input from user
$fakeFile  	= fopen('php://stdin', 'r');
$type 		= (int)trim(fgets($fakeFile));
$text 		= (string)trim(fgets($fakeFile));
$symbols	= (int)trim(fgets($fakeFile));

// get result
echo cezar_crypter($type, $text, $symbols);
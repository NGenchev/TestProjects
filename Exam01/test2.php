<?php // guess server random number + 3debugg points
	global $cows;
	global $bulls;

	function randNum() //generete random number with distinct digits
	{
		$pcNum  	= (string)mt_rand(1000, 9999);
		$pcNum 		= array_unique(str_split($pcNum));
		while(count($pcNum)<4) 
		{
			$pcNum  	= (string)mt_rand(1000, 9999);
			$pcNum 		= array_unique(str_split($pcNum));
		}

		return implode($pcNum);
	}

	function guess($userInput, $pcNum, &$counter) //try guess the rand num with user inpuut
	{
		$cows 	= 0;
		$bulls 	= 0;

		// find equal digits and positions
		$i = 0; $j = 0;

		$userInput 	= str_split($userInput);
		$pcNum 		= str_split($pcNum);

		foreach($userInput as $uDigit)
		{
			$i++;
			$j = 0; //echo "i = $i \n"; --> debugging 1
		 	foreach($pcNum as $oDigit)
		 	{
		 		$j++; //echo "\t i = $i | j = $j | $uDigit == $oDigit\n"; --> debugging 2

		 		if($uDigit == $oDigit)
		 			if($i == $j) 
		 			{
		 				$cows++;
		 				$bulls++;
		 			}
		 			else $cows++;
		 	}
		}

		if($bulls==4)
			{
				echo "You guessed from $counter time!";
				exit(1);
			}
		else
			echo "Cows: ".$cows." | Bulls: ".$bulls." | Try #". ++$counter .";\n";
	}

	$pcNum = randNum();
	// echo $pcNum."\n"; --> debugging 3
	$countGuess = 0;
	$end 		= false;
	$fakeFile  	= fopen('php://stdin', 'r');

	while ($end==false)
	{
		// check user input
		$userInput = (string)trim(fgets($fakeFile));

		if(strlen($userInput)==4)
			if(($userInput[0]!=$userInput[1] && 
				  $userInput[0]!=$userInput[2] &&
					$userInput[0]!=$userInput[3]) &&

			($userInput[1]!=$userInput[2] && 
				$userInput[1]!=$userInput[3]) &&

			$userInput[2]!=$userInput[3])
				guess($userInput, $pcNum, $countGuess);
			else
				echo "Equal digits found!\n";
		else
			echo "Not 4digits!\n";
	}
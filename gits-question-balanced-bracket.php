<?php

function checkBracket($input)
{
	$outp = 'NO';
	
	# whitespace removal
	$input = preg_replace('/\s+/', '', $input);

	$count = strlen($input);
	$unpaired = [];
	$rightBracketPairMap = [
		')' => '(',
		'}' => '{',
		']' => '[',
	];
	for ($i = 0; $i < $count; $i++) {
		$currentBracket = $input[$i];
		if (array_key_exists($currentBracket, $rightBracketPairMap)) {
			if (end($unpaired) === $rightBracketPairMap[$currentBracket]) {
				array_pop($unpaired);
			} else {
				break;
			}
		} else {
			$unpaired[] = $currentBracket;
		}        
	}
    
	if (empty($unpaired) && $count > 0) {
		$outp = 'YES';
	}

	return $outp;
}

# example of input
$input = '{ ( ( [ ] ) [ ] ) [ ] }';
echo checkBracket($input);

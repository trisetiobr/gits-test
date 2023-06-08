<?php 

function stringQuery($stringInput, $queryInput)
{
    $weightMap = [
        'a' => 1,
        'b' => 2,
        'c' => 3,
        'd' => 4,
        'e' => 5,
        'f' => 6,
        'g' => 7,
        'h' => 8,
        'i' => 9,
        'j' => 10,
        'k' => 11,
        'l' => 12,
        'm' => 13,
        'n' => 14,
        'o' => 15,
        'p' => 16,
        'q' => 17,
        'r' => 18,
        's' => 19,
        't' => 20,
        'u' => 21,
        'v' => 22,
        'w' => 23,
        'x' => 24,
        'y' => 25,
        'z' => 26
    ];
    $length = strlen($stringInput);
    
    $prevChar = '';
    $currentChar = '';
    $currentWeight = 0;
    $weightList = [];
    $outp = [];

    for ($i = 0; $i < $length; $i++) {
    	$currentChar = $stringInput[$i];

        if ($prevChar != $currentChar) {
            $currentWeight = $weightMap[$currentChar];
        } else {
            $currentWeight += $weightMap[$currentChar];
        }
        
        $prevChar = $currentChar;
        
        if (!in_array($currentWeight, $weightList)) {
            $weightList[] = $currentWeight;
        }
    }

    $count = count($queryInput);
    foreach ($queryInput as $q) {
        if (in_array($q, $weightList)) {
            $outp[] = 'Yes';
        } else {
            $outp[] = 'No';
        }
    }
    
    return $outp;
}

## example of input
$stringInput = 'abbcccd';
$queryInput =  [1, 3, 9, 8];
$output = stringQuery($stringInput, $queryInput);
echo "[" . implode(',', $output) . ']';

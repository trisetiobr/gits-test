<?php

function highPalindrome($input, $k)
{
    $length = strlen($input);
    
    if ($length <= 1) {
        return $input;
    }
    
    if ($input[0] != $input[$length - 1]) {
        if ($k > 0) {
            if ($input[0] > $input[$length - 1]) {
                $input[$length - 1] = $input[0];
            } else {
                $input[0] = $input[$length - 1];
            }
            $k--;
        } else {
            return -1;
        }
    }
    
    $substring = substr($input, 1, $length - 2);
    $result = highPalindrome($substring, $k);
    
    if ($result === -1) {
        return -1;
    }

    return $input[0] . $result . $input[$length - 1];
}

# example usage
$input = '3943';
$k = 1;
echo highPalindrome($input, $k);

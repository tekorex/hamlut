<?php
/**
 * hamlut - Fast Hamming distance for base64-encoded binary data
 * 
 * Author: tekorex
 * License: MIT
 * Repository: https://github.com/tekorex/hamlut
 */

/**
 * Calculate the Hamming distance between two base64-encoded strings
 *
 * @param string $s1 First base64-encoded string
 * @param string $s2 Second base64-encoded string
 * @return int The Hamming distance (number of differing bits)
 */
function hamming_base64($s1, $s2) {
    static $b64 = [
        'A'=>0, 'B'=>1, 'C'=>2, 'D'=>3, 'E'=>4, 'F'=>5, 'G'=>6, 'H'=>7,
        'I'=>8, 'J'=>9, 'K'=>10, 'L'=>11, 'M'=>12, 'N'=>13, 'O'=>14, 'P'=>15,
        'Q'=>16, 'R'=>17, 'S'=>18, 'T'=>19, 'U'=>20, 'V'=>21, 'W'=>22, 'X'=>23,
        'Y'=>24, 'Z'=>25, 'a'=>26, 'b'=>27, 'c'=>28, 'd'=>29, 'e'=>30, 'f'=>31,
        'g'=>32, 'h'=>33, 'i'=>34, 'j'=>35, 'k'=>36, 'l'=>37, 'm'=>38, 'n'=>39,
        'o'=>40, 'p'=>41, 'q'=>42, 'r'=>43, 's'=>44, 't'=>45, 'u'=>46, 'v'=>47,
        'w'=>48, 'x'=>49, 'y'=>50, 'z'=>51, '0'=>52, '1'=>53, '2'=>54, '3'=>55,
        '4'=>56, '5'=>57, '6'=>58, '7'=>59, '8'=>60, '9'=>61,
        '-'=>62, '_'=>63, '+'=>62, '/'=>63, '='=>0
    ];
    static $pop = [
        0,1,1,2,1,2,2,3,1,2,2,3,2,3,3,4,
        1,2,2,3,2,3,3,4,2,3,3,4,3,4,4,5,
        1,2,2,3,2,3,3,4,2,3,3,4,3,4,4,5,
        2,3,3,4,3,4,4,5,3,4,4,5,4,5,5,6
    ];
    $dist = 0;
    $n = min(strlen($s1), strlen($s2));
    for($i = 0; $i < $n; $i++) $dist += $pop[$b64[$s1[$i]] ^ $b64[$s2[$i]]];
    return $dist;
}
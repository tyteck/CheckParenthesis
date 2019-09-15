<?php

class CheckParenthesis
{
    public static function check($expression)
    {
        $brackets = [];
        foreach (str_split($expression) as $char) {
            if (in_array($char, ['(', '[', '{'])) {
                array_push($brackets, $char);
            }

            if (in_array($char, [')', ']', '}'])) {
                if (count($brackets) == 0) {
                    return false;
                }

                $popChar = array_pop($brackets);
                if ($char == ')' && in_array($popChar, ['[', '{'])) {
                    return false;
                }

                if ($char == ']' && in_array($popChar, ['(', '{'])) {
                    return false;
                }

                if ($char == '}' && in_array($popChar, ['(', '['])) {
                    return false;
                }
            }
        }
        if (count($brackets) == 0){
            return true;
        } 
        return false;
    }
}


$expressions = [
    "()" => true,
    "(" => false,
    "((" => false,
    "({(" => false,
    "[" => false,
    "]" => false,
    "}" => false,
    "(]" => false,
    "(}" => false,
    "[]" => true,
    "[)" => false,
    "[}" => false,
    "{}" => true,
    "{)" => false,
    "{]" => false,
    "{}" => true,
    "([{}])" => true,
    "{echo}" => true,
    "[(3 + 6) * (10 - 3) + 122] / 3 = )" => false,
    "{170/85+[(12+46)*15]/2+(13+5)/22}*(1949412-213442)-6=?" => true,
    "((([[{{([{}])}}]])))" => true,
    "{echo 'the cat is rich';}" => true,
];

foreach ($expressions as $exp => $expectedResult) {
    if ($expectedResult === CheckParenthesis::check($exp)) {
        echo '.';
    } else {
        echo "F";
    }
}
echo PHP_EOL;

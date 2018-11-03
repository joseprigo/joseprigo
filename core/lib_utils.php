<?php

/**
 * Converts array into a reference
 * Used to dinamically prepare statements https://www.pontikis.net/blog/dynamically-bind_param-array-mysqli
 * @param type $arr
 * @return type
 */
function refValues($arr){
    if (strnatcmp(phpversion(),'5.3') >= 0) //Reference is required for PHP 5.3+
    {
        $refs = array();
        foreach($arr as $key => $value)
            $refs[$key] = &$arr[$key];
        return $refs;
    }
    return $arr;
}

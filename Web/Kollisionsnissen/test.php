<?php

$arr_01 = array('hest');
$arr_02 = array('ko');

if (true) {
    $b = $arr_01;
    $p = $arr_02;

    echo "<p>Input1 = " . $b . "</p>";
    echo "<p>Input2 = " . $p . "</p>";

    $hb = hash('sha256', $b);
    echo "\nb: " . $hb;
    $hp = hash('sha256', $p);
    echo "\np: " . $hp;

    if($b == $p) {
        echo "\n\nIdentical";
    }

    else if(hash('sha256', $b)  === hash('sha256', $p))
    {
        echo "\n\nFLAG!!";
    }
    else if(hash('md5', $b)  === substr(hash('sha1', $p),-strlen(hash('md5', $b))) )
        {
        echo "\n\nFLAG!!";
        }
    else if(hash('sha1', $b)  === substr(hash('sha256', $p),-strlen(hash('sha1', $b))) )
        {
                echo "\n\nFLAG!!";
        }
    else if(substr(hash('sha256', $b),strlen(hash('md5', $b)))  === substr(hash('sha256', $p),-strlen(hash('md5', $p))) )
        {
                echo "\n\nFLAG!!";
        }
    else {
        echo "\n\nForkert";
    }

}

?>
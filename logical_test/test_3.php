<?php

function opbp($a, $b)
{
    echo $a." : ".$b." = ";
    $a /= $b;
    echo number_format($a);
}


opbp(8, 4);
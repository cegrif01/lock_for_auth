<?php

if ( ! function_exists('pp')) {

    /**
     * The pp function makes pretty array formats easy to run just do pp($array)
     *
     * @param array   $x   Array to be printed
     * @param boolean $die If true die will be called
     *
     * @return void
     */
    function pp($x, $die=true)
    {
        echo "<pre>".print_r($x, true)."</pre>";
        if ($die) die;
    }
}
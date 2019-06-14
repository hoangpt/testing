<?php

define("ABS_APP_PATH", __DIR__.'/../src');

/**
 * Class TestUtil
 * @author hoang.pt
 */
class TestUtil{

    public static function assertEqual($output, $expected){

        if($output != $expected){
            echo 'F';
            return "\nNeed to be $expected, but actually is $output.";
        }

        echo '.';
        return '';
    }
}
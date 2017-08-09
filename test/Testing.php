<?php
namespace test;

class Testing
{
    public static function assertEquals($expected, $have, $message = 'Something wrong')
    {
        if ($expected !== $have) {
            echo $message .': '. $have . ' is not equals ' . $expected.\PHP_EOL;
            exit();
        }
    }
}

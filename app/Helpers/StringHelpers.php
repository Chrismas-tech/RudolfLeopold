<?php

namespace App\Helpers;

class StringHelpers
{

    public static function first_letter_of_word($string)
    {
        return substr($string, 0, 1);
    }

    public static function clear_shopping_cart_product_options($string)
    {
        $string = StringHelpers::remove_first_string($string);
        $string = StringHelpers::remove_last_string($string);
        return $string;
    }


    public static function remove_first_string($string)
    {
        return substr($string, 1);
    }

    public static function remove_last_string($string)
    {
        return substr($string, 0, -1);
    }
}

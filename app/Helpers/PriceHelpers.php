<?php

namespace App\Helpers;

use Gloudemans\Shoppingcart\Facades\Cart;

class PriceHelpers
{
    /**
     * Calculate displayed original_price after discount
     * @param $discount_percent
     * @param $original_price
     */
    public static function selling_price_after_discount($discount_percent, $original_price)
    {
        $discount_percent = intval($discount_percent);
        $original_price = intval($original_price);

        $final_price = $original_price - ($original_price * $discount_percent / 100);

        return number_format($final_price / 100, 2);
    }

    /**
     * Calculate price 
     * @param $price
     */
    public static function selling_price($price)
    {
        $price = intval($price) / 100;
        return number_format($price, 2);
    }

    /**
     * Calculate Cart Total Price
     * @param $price
     */
    public static function cart_total_price()
    {
        $price = Cart::total('2', '', '');
        $price = intval($price) / 10000;
        return number_format($price, 2);
    }
}

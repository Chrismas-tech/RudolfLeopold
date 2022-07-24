<?php

namespace App\Rules;

use App\Helpers\Helpers;
use Illuminate\Contracts\Validation\Rule;

class DiscountSmallerThanPrice implements Rule
{

    private $price;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($price)
    {
        // On doit sanitize car l'utilisateur peut utiliser des virgules
        $this->price = Helpers::sanitize_db_price($price);
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return Helpers::sanitize_db_price($value) < $this->price;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The discount price cannot be bigger than the price';
    }
}

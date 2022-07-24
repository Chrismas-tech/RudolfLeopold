<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\UploadedFile;

class TotalSizeUpload implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

    private $limit;
    private $megabyte = 1048576;

    public function __construct($limit)  // in MegaBytes
    {
        // Conversion to bytes
        // 1MB =  1 048 576 Bytes

        $this->limit = $limit * $this->megabyte;
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
        $total = 0;

        if (!is_array($value)) {
            return false;
        }

        foreach ($value as $file) {
            if (!$file instanceof UploadedFile) {
                return false;
            }
            $total += $file->getSize();
        }

        return $total < $this->limit;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Upload Size Product Variant : The total size upload must not exceed ' . $this->limit / $this->megabyte . ' MB.';
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: Jan
 * Date: 28 Jun 2017
 * Time: 12:48
 */

namespace App\Helpers;


class FormHelper
{
    static function selectValue($value, $compare)
    {
        return ($value == $compare) ? 'selected' : '';
    }
}
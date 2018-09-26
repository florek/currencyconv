<?php

namespace Florek\CurrencyConverter\Service\Currency;

use Florek\CurrencyConverter\Service\Api;

class Converter implements Api
{

    public static function getResponse(array $request)
    {
        $convertedValue = self::_convert('RUB', 'PLN') * $request['currency_value'];
        return round($convertedValue, 2);
    }

    protected static function _convert($from, $to)
    {
        $conversionString = $from . '_' . $to;
        $string = file_get_contents("http://free.currencyconverterapi.com/api/v3/convert?q=$conversionString&compact=ultra");
        $result = json_decode($string, true);
        if (isset($result[$conversionString])) {
            return $result[$conversionString];
        }
        return null;
    }

}